<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 14:39
 */

namespace Addons\Model;


class Nurse
{
    //获取患者档案
    public function getPatientInfo($userId)
    {
        //分别获取对应的参数
        $orgId = model('User')->getOrgIdByUserId(bus('tokenInfo')['userId']);
        $userBasic = model('Patient')->getCutUserInfo($userId,$orgId);
        if($userBasic){
            $cases = model('Cases')->getPersonalCases($userId,$orgId);
            $contacts = model('Contacts')->getContacts($userId);
            $userBasic['contacts']=$contacts;
            $userBasic['diseaseList'] = $cases;
        }
        return $userBasic;
    }

    private function getRandChar($length,$strPol){
        $str = null;
        $max = strlen($strPol)-1;
        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }

    //自动生成login登录，临时用户
    private function getUserLogin()
    {
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        return $this->getRandChar(11,$strPol);
    }

    //生成临时用户密码
    private function getPassword()
    {
        $strPol = "0123456789abcdefghijklmnopqrstuvwxyz";
        return $this->getRandChar(6,$strPol);
    }

    //获取本医院所有的患者列表
    public function getHosPatientList($orgId)
    {
        $orgId = intval($orgId);
        $patientList = server('Db')->getAll("select trueName,gender,age,u.userId from user u,patient p  where u.userId=p.userId and orgId={$orgId} and u.active=1");
        return $patientList?:[];
    }

    //获取本医院当前测量计划map
    public function getNoDetectionMap(array $userIdList)
    {
        $time = date('Ymd',time());
        $userIdString='('.implode(',',$userIdList).')';
        $noDetection = server('Db')->getMap("select `userId`, `noDetection` from measure_plan where
            userId in {$userIdString} and beginTime<'{$time}' and endTime>'{$time}'");
        foreach($noDetection as $k=>$v){
            $detection = unserialize($v);
            $counts=array_count_values($detection);
            $noDetection[$k]=$counts[0];
        }
        return $noDetection?:[];
    }

    //获取护士界面患者显示列表
    public function getShowHosPatientList($orgId,$page,$num,$field=null,$sort=null)
    {
        $time = date('Ymd',time());
        $orgId = intval($orgId);
        $page = intval($page)-1;
        $num = intval($num);
        //排序
        $fieldSort = '';
        if($field){
            $fields = ['age','trueName','gender','isNewUser','noDetection'];
            if(in_array($field,$fields)){
                if($fields!='trueName'){
                    $fieldSort=$sort?"order by {$field} asc":"order by {$field} desc";
                }else{
                    $fieldSort=$sort?"order by convert(trueName using gbk) asc ":" order by convert(trueName using gbk) desc";
                }
            }
        }
        $patientList=server('Db')->getAll("select list.*,isNewUser from (select user.*,noDetection from (select u.userId,trueName,age,gender from user u
        ,patient p where u.userId=p.userId and orgId= {$orgId} and u.active=1)as user left join (select userId ,noDetection
        from measure_plan where beginTime<'$time' and endTime>'$time' and userId in (select userId from user
        where orgId={$orgId} and active=1 and groupId in(20,21)))as measure on user.userId=measure.userId)as list left join
        (select userId as isNewUser from final_report where userId in (select userId from user where orgId={$orgId} and
        active=1 and groupId in(20,21))group by userId) as final on final.isNewUser=list.userId {$fieldSort} limit $page,$num");
        $patientList = $patientList?:[];
        foreach($patientList as $k=>$v){
            $patientList[$k]['gender']=intval($v['gender']);
            $patientList[$k]['age']=intval($v['age']);
            $patientList[$k]['userId']=intval($v['userId']);
            $patientList[$k]['noDetection'] = $v['noDetection']?count(unserialize($v['noDetection'])):0;
            $patientList[$k]['isNewUser'] = $v['isNewUser']?1:0;
        }
        return $patientList;
    }

    //搜索某个人的列表显示信息
    public function searchPatient($trueName,$orgId)
    {
        $trueName = saddslashes($trueName);
        $orgId = intval($orgId);
        $patientList = server('Db')->getAll("select u.userId,trueName,age,gender from user u,patient p where trueName like'%{$trueName}%' and u.userId=p.userId  and orgId={$orgId}");
        if($patientList){
            $userIdList = array();
            foreach($patientList as $v){
               $userIdList[] =  $v['userId'];
            }
            if($userIdList){
                $noDetection = $this->getNoDetectionMap($userIdList);
                $isNewUser = model('Finalreport')->isNewUser($userIdList);
                foreach($patientList as $k=>$v){
                    $patientList[$k]['gender']=intval($v['gender']);
                    $patientList[$k]['age']=intval($v['age']);
                    $patientList[$k]['userId']=intval($v['userId']);
                    $patientList[$k]['noDetection'] = $noDetection[$v['userId']]?:0;
                    $patientList[$k]['isNewUser'] = in_array($v['userId'],$isNewUser)?1:0;
                }
            }

        }
        return $patientList?:[];
    }

    //添加患者
    public function addPatient($orgId,$login)
    {
        $orgId = intval($orgId);
        $login = saddslashes($login);
        $check = server('Db')->query("update user set orgId={$orgId} where login='{$login}'");
        return $check?true:false;
    }

    //注册患者和患者详情
    public function insertUser($req)
    {
        $req['password'] = $this->getPassword();
        $map = model('Usergroup')->getMapUserGroup();
        $req['groupId'] = $map['casualUser'];
        $req['active']=0;
        $userId=model('User')->insertUser($req);
        return $userId?:null;
    }

    //更改用户信息状态
    public function updateUserState($userId)
    {
        model('User')->updateUserActiveByUserId($userId);
        model('Cases')->updateCasesActiveByUserId($userId);
        model('Contacts')->updateContactsActiveByUserId($userId);
        model('Measureplan')->updateMeasurePlanActiveByUserId($userId);
    }

    //删除临时用户信息
    public function deleteInvalidUserInfo($userId)
    {
        model('Cases')->deleteAllInvalidCases($userId);
        model('Contacts')->deleteAllInvalidContacts($userId);
        model('Measureplan')->deleteAllInvalidMeasurePlan($userId);
        model('User')->deleteInvalidUser($userId);
    }
}