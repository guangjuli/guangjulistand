<div class="row">
    <form class="form-horizontal" method="post" action="/man/?devicetype/html/add">
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">设备类型</label>
                <div class="col-sm-10">
                    <input name="type" value="" class="form-control"  placeholder="设备类型">
                </div>
            </div>
            <div class="form-group">
                <label for="des" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <input  name="des" value="" class="form-control"  placeholder="描述">
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="" class="form-control"  placeholder="排序">
                </div>
            </div>
            <div class="form-group">
                <label for="active" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active"  value="1" >
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active"  value="0" >
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">添加</button>
                </div>
            </div>

        </div>

    </form>
</div>
