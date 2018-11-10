<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品分类管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/AdminLTE.css">
    <link rel="stylesheet" href="/css/_all-skins.min.css">
    <link rel="stylesheet" href="/css/a_style.css">
    <script src="/js/jquery-2.2.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <style>
        a{
            color:#fff;
        }
    </style>
</head>

<body class="hold-transition skin-red sidebar-mini">
    <!-- .box-body -->

    <div class="box-header with-border">
        <h3 class="box-title">商品分类管理
        </h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal"><i
                                class="fa fa-file-o"></i> 新建</button>
                        <!-- <button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button>
                        <button type="button" class="btn btn-default" title="刷新"><i class="fa fa-check"></i> 刷新</button> -->

                    </div>
                </div>
            </div>


            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                    <tr>
                        <th class="" style="padding-right:0px">
                            <input type="checkbox" class="icheckbox_square-blue">
                        </th>
                        <th class="sorting_asc">分类ID</th>
                        <th class="sorting">分类名称</th>
                        <th class="sorting">父ID</th>
                        <th class="sorting">所有父级ID</th>
                        <th class="text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $v->id }}</td>
                        <td>{{ str_repeat('-',8*(count(explode('-',$v->path))-2)).$v->class_name }}</td>
                        <td>
                            {{ $v->parent_id }}
                        </td>
                        <td>
                            {{ $v->path }}
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">修改</button>
                            <button  type="button" class="btn btn-danger btn-xs">
                                <a href="{{ route('delete_type',['id'=>$v->id]) }}" onclick="return confirm('确定要删除吗？');">删除</a>
                            </button>
                            <!-- <button type="button">删除</button> -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--数据列表/-->

        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->


    <!-- 编辑窗口 -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">  
            <div class="modal-content">
            <form action="{{ route('add_type') }}" method="post">
             @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">添加商品分类</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped" width="800px">
                        <tr>
                            <td>选择一级分类</td>   
                            <td>
                                <select name="cat">
                                    <option value="0">默认为最高级</option>
                                    @foreach($data as $v)
                                            @if(count(explode('-',$v->path))<4)
                                            <option value="{{ $v->id }}|{{ $v->path }}">{{ str_repeat('-',8*(count(explode('-',$v->path))-2)).$v->class_name }}</option>
                                            @endif
                                    @endforeach                                
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td>商品分类名称</td>
                            <td><input class="form-control" name="class_name" placeholder="分类名称"> </td>
                        </tr>   

                    </table>
                </div>
                <div class="modal-footer">

                    <input type="submit"  class="btn btn-success" value="保存">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>

</html>
