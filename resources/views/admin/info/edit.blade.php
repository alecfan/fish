@extends('admin.parent') @section('basecss')
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}" />
@endsection @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
      Dropzone.js <small> <i class="icon-double-angle-right"></i> Drag
        &amp; drop file upload with image preview
      </small>
    </h1>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="alert alert-info">
        <i class="icon-hand-right"></i> 啦啦啦啦啦啦啦啦啦啦啦啦啦啦啊啊啊啊啊啊啊啊啊啊啊啊啊
        <button class="close" data-dismiss="alert">
          <i class="icon-remove"></i>
        </button>
      </div>
      <div id="dropzone">
        <form action="//admin" class="dropzone dz-clickable">
          <div class="dz-default dz-message">
            <span><span class="bigger-150 bolder"><i
                class="icon-caret-right red"></i> Drop files</span> to
              upload <span class="smaller-80 grey">(or click)</span> <br>
              <i class="upload-icon icon-cloud-upload blue icon-3x"></i></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection @section('basejs')
<script src="{{ asset('admin/js/dropzone.min.js') }}"></script>
@endsection @section('inlinejs')
<script type="text/javascript">
jQuery(function($){
    try {
    $(".dropzone").dropzone({
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 0.5, // MB

    addRemoveLinks : true,
    dictDefaultMessage :
    '<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> Drop files</span> to upload \
    <span class="smaller-80 grey">(or click)</span> <br /> \
    <i class="upload-icon icon-cloud-upload blue icon-3x"></i>'
    ,

    //change the previewTemplate to use Bootstrap progress bars
    previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
    });
    } catch(e) {
    alert('Dropzone.js does not support older browsers!');
    }

    });
</script>
@endsection
