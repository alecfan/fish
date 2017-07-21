@extends('home.person.parent') {{-- 个人信息页css --}}
@section('editInfoCSS')
<link href="{{ asset('home/css/infstyle.css') }}" rel="stylesheet"
  type="text/css">
@endsection @section('infoActive') active @endsection {{-- 页面主体 --}}
@section('content')


<div class="user-info">
  @if (session('msg'))
  <div style="color: red;">{{ session('msg') }}</div>
  @endif @if (session('error'))
  <div style="color: red;">{{ session('error') }}</div>
  @endif
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li> @endforeach
  </ul>
</div>
@endif

<!--标题 -->
@foreach($list as $v)
<div class="am-cf am-padding">
  <div class="am-fl am-cf">
    <strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small>
  </div>
</div>
<hr>

<!--头像 -->
<div class="user-infoPic">

  <div class="filePic">
    <img class="am-circle am-img-thumbnail"
      src="{{ url('/home/upload/'.$v->photo) }}" alt="">
  </div>

  <p class="am-form-help">头像</p>

  <div class="info-m">
    <div>
      <b>用户名：<i>{{$v->username}}</i></b>
    </div>
    <div class="u-level">
      <span class="rank r2"> <s class="vip1"></s>

        <?php
        if ($v->score > 500) {
            echo '黑钻会员';
        } else if ($v->score > 400) {
            echo '钻石会员';
        } else if ($v->score > 300) {
            echo '黄金会员';
        } else if ($v->score > 200) {

            echo '白银会员';
        } else {
            echo '普通会员';
        }
        ?>

        </span>
    </div>
    <div class="u-safety">
      <a href="safety.html"> 账户安全 <span class="u-profile"><i
          class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
      </a>
    </div>
  </div>
</div>


<!--个人信息 -->
<div class="info-main">
  <form class="am-form am-form-horizontal" action="/person/info"
    method='post' enctype='multipart/form-data'>
    {{ csrf_field() }}
    <div class="am-form-group">
      <label for="user-name2" class="am-form-label">昵称</label>
      <div class="am-form-content">
        <input type="text" id="user-name2"
          placeholder="{{ $v->username }}" name="username">

      </div>
    </div>




    <div class="am-form-group">
      <label class="am-form-label">性别</label>
      <div class="am-form-content sex">
        <label class="am-radio-inline"> <input type="radio" name="sex"
          value="1" data-am-ucheck="" class="am-ucheck-radio"><span
          class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i
            class="am-icon-checked"></i></span> 男
        </label> <label class="am-radio-inline"> <input type="radio"
          name="sex" value="0" data-am-ucheck="" class="am-ucheck-radio"><span
          class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i
            class="am-icon-checked"></i></span> 女

      </div>
    </div>

    <div class="am-form-group" >
      <label for="user-birth" class="am-form-label">生日</label>
      <div class="row">
        <div class="col-xs-6">
          <div class="input-group input-group-sm">
            <input type="text" id="datepicker" class="form-control"
              name="birthday" style="width:695px;margin-left:85px;"/> <span class="input-group-addon"> <i
              class="icon-calendar"></i>
            </span>
          </div>
        </div>
      </div>

    </div>

    <div class="am-form-group">
      <label for="user-name" class="am-form-label">更换头像</label>
      <div class="am-form-content">
        <input type="file" id="user-name2" name='photo' multiple>
      </div>
      <div class="am-form-content">
        <input type="hidden" id="user-name2" name='image' value="{{ $v->photo }}" multiple>
      </div>
    </div>


    <button type='submit'>
      <div class="info-btn">
        <div class="am-btn am-btn-danger">保存修改</div>
      </div>
      <button>

  </form>


</div>
@endforeach
<script type="text/javascript">
      jQuery(function($) {

        $( "#datepicker" ).datepicker({
          showOtherMonths: true,
          selectOtherMonths: false,
          //isRTL:true,


          /*
          changeMonth: true,
          changeYear: true,

          showButtonPanel: true,
          beforeShow: function() {
            //change button colors
            var datepicker = $(this).datepicker( "widget" );
            setTimeout(function(){
              var buttons = datepicker.find('.ui-datepicker-buttonpane')
              .find('button');
              buttons.eq(0).addClass('btn btn-xs');
              buttons.eq(1).addClass('btn btn-xs btn-success');
              buttons.wrapInner('<span class="bigger-110" />');
            }, 0);
          }
      */
        });


        //override dialog's title function to allow for HTML titles
        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
          _title: function(title) {
            var $title = this.options.title || '&nbsp;'
            if( ("title_html" in this.options) && this.options.title_html == true )
              title.html($title);
            else title.text($title);
          }
        }));

        $( "#id-btn-dialog1" ).on('click', function(e) {
          e.preventDefault();

          var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
            modal: true,
            title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='icon-ok'></i> jQuery UI Dialog</h4></div>",
            title_html: true,
            buttons: [
              {
                text: "Cancel",
                "class" : "btn btn-xs",
                click: function() {
                  $( this ).dialog( "close" );
                }
              },
              {
                text: "OK",
                "class" : "btn btn-primary btn-xs",
                click: function() {
                  $( this ).dialog( "close" );
                }
              }
            ]
          });

          /**
          dialog.data( "uiDialog" )._title = function(title) {
            title.html( this.options.title );
          };
          **/
        });


        $( "#id-btn-dialog2" ).on('click', function(e) {
          e.preventDefault();

          $( "#dialog-confirm" ).removeClass('hide').dialog({
            resizable: false,
            modal: true,
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i> Empty the recycle bin?</h4></div>",
            title_html: true,
            buttons: [
              {
                html: "<i class='icon-trash bigger-110'></i>&nbsp; Delete all items",
                "class" : "btn btn-danger btn-xs",
                click: function() {
                  $( this ).dialog( "close" );
                }
              }
              ,
              {
                html: "<i class='icon-remove bigger-110'></i>&nbsp; Cancel",
                "class" : "btn btn-xs",
                click: function() {
                  $( this ).dialog( "close" );
                }
              }
            ]
          });
        });



        //autocomplete
         var availableTags = [
          "ActionScript",
          "AppleScript",
          "Asp",
          "BASIC",
          "C",
          "C++",
          "Clojure",
          "COBOL",
          "ColdFusion",
          "Erlang",
          "Fortran",
          "Groovy",
          "Haskell",
          "Java",
          "JavaScript",
          "Lisp",
          "Perl",
          "PHP",
          "Python",
          "Ruby",
          "Scala",
          "Scheme"
        ];
        $( "#tags" ).autocomplete({
          source: availableTags
        });

        //custom autocomplete (category selection)
        $.widget( "custom.catcomplete", $.ui.autocomplete, {
          _renderMenu: function( ul, items ) {
            var that = this,
            currentCategory = "";
            $.each( items, function( index, item ) {
              if ( item.category != currentCategory ) {
                ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                currentCategory = item.category;
              }
              that._renderItemData( ul, item );
            });
          }
        });

         var data = [
          { label: "anders", category: "" },
          { label: "andreas", category: "" },
          { label: "antal", category: "" },
          { label: "annhhx10", category: "Products" },
          { label: "annk K12", category: "Products" },
          { label: "annttop C13", category: "Products" },
          { label: "anders andersson", category: "People" },
          { label: "andreas andersson", category: "People" },
          { label: "andreas johnson", category: "People" }
        ];
        $( "#search" ).catcomplete({
          delay: 0,
          source: data
        });


        //tooltips
        $( "#show-option" ).tooltip({
          show: {
            effect: "slideDown",
            delay: 250
          }
        });

        $( "#hide-option" ).tooltip({
          hide: {
            effect: "explode",
            delay: 250
          }
        });

        $( "#open-event" ).tooltip({
          show: null,
          position: {
            my: "left top",
            at: "left bottom"
          },
          open: function( event, ui ) {
            ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
          }
        });


        //Menu
        $( "#menu" ).menu();


        //spinner
        var spinner = $( "#spinner" ).spinner({
          create: function( event, ui ) {
            //add custom classes and icons
            $(this)
            .next().addClass('btn btn-success').html('<i class="icon-plus"></i>')
            .next().addClass('btn btn-danger').html('<i class="icon-minus"></i>')

            //larger buttons on touch devices
            if(ace.click_event == "tap") $(this).closest('.ui-spinner').addClass('ui-spinner-touch');
          }
        });

        //slider example
        $( "#slider" ).slider({
          range: true,
          min: 0,
          max: 500,
          values: [ 75, 300 ]
        });



        //jquery accordion
        $( "#accordion" ).accordion({
          collapsible: true ,
          heightStyle: "content",
          animate: 250,
          header: ".accordion-header"
        }).sortable({
          axis: "y",
          handle: ".accordion-header",
          stop: function( event, ui ) {
            // IE doesn't register the blur when sorting
            // so trigger focusout handlers to remove .ui-state-focus
            ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
          }
        });
        //jquery tabs
        $( "#tabs" ).tabs();


        //progressbar
        $( "#progressbar" ).progressbar({
          value: 37,
          create: function( event, ui ) {
            $(this).addClass('progress progress-striped active')
                 .children(0).addClass('progress-bar progress-bar-success');
          }
        });

      });
    </script>


@endsection
