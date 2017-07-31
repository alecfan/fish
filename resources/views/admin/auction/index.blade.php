@extends('admin.parent') @section('path')
<li class="active">拍卖管理</li>
@endsection @section('auctionActive') class="active" @endsection @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>拍卖管理</h1>
  </div>
  {{-- 页头结束 --}} {{-- 页面主体开始 --}}
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        @if(session()->has('hasDel') && session('hasDel') == 'ok')
        <div class="alert alert-block alert-success">
          <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
          </button>
          <i class="icon-ok green"></i>
          删除成功
        </div>
        @endif
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th class="center">
                <label>
                  <input type="checkbox" class="ace">
                  <span class="lbl"></span>
                </label>
              </th>
              <th>发布标题</th>
              <th>发布人</th>
              <th class="hidden-480">起拍价格</th>
              <th>
                <i class="icon-time bigger-110 hidden-480"></i> 发布时间
              </th>
              <th class="hidden-480">状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($goods as $good)
            <tr>
              <td class="center">
                <label>
                  <input type="checkbox" class="ace">
                  <span class="lbl"></span>
                </label>
              </td>
              <td>
                <a href="#">{{ $good->title }}</a>
              </td>
              <td>{{ $good->username }}</td>
              <td class="hidden-480">{{ $good->startprice }}</td>
              <td>{{ date('Y-m-d H:i', $good->addtime) }}</td>
              <td class="hidden-480">
                @if($good->status == 0)
                <span class="label label-sm label-success">正在卖</span> @elseif($good->status == 1)
                <span class="label label-sm label-danger">已下架</span> @elseif($good->status == 2)
                <span class="label label-sm label-warning">已拍下</span> @elseif($good->status == 3)
                <span class="label label-sm label-info">已售出</span> @endif
              </td>
              <td>
                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
<form action="" method="post" name="myform">
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>

                  <button class="btn btn-xs btn-danger" onclick="doDel('{{ $good->id }}')">
                    <i class="icon-trash bigger-120"></i>
                  </button>

<script>
function doDel(id){
  var myform = document.myform;
  var url = "{{ url('/admin/auction') }}" +  '/' + id;
  myform.action = url;
  myform.submit();
}

</script>

                </div>
                <div class="visible-xs visible-sm hidden-md hidden-lg">
                  <div class="inline position-relative">
                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-cog icon-only bigger-110"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                      <li>
                        <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                          <span class="blue">
                            <i class="icon-zoom-in bigger-120"></i>
                        </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                          <span class="green">
                            <i class="icon-edit bigger-120"></i>
                        </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                          <span class="red">
                            <i class="icon-trash bigger-120"></i>
                        </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /span -->
  </div>
  <div class="row">
    <div class="col-xs-12">
      {!! $goods->render() !!}
    </div>
  </div>
  @endsection @section('basejs')
  <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.dataTables.bootstrap.js') }}"></script>
  @endsection @section('inlinejs')
  <script type="text/javascript">
  jQuery(function($) {
    var oTable1 = $('#sample-table-2').dataTable({
      "aoColumns": [{
          "bSortable": false
        },
        null, null, null, null, null, {
          "bSortable": false
        }
      ]
    });


    $('table th input:checkbox').on('click', function() {
      var that = this;
      $(this).closest('table').find('tr > td:first-child input:checkbox')
        .each(function() {
          this.checked = that.checked;
          $(this).closest('tr').toggleClass('selected');
        });

    });


    $('[data-rel="tooltip"]').tooltip({
      placement: tooltip_placement
    });

    function tooltip_placement(context, source) {
      var $source = $(source);
      var $parent = $source.closest('table')
      var off1 = $parent.offset();
      var w1 = $parent.width();

      var off2 = $source.offset();
      var w2 = $source.width();

      if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
      return 'left';
    }
  })
  </script>
  @endsection
