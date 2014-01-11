<script>
//callbacks
window.bc_callbacks = {};
</script>


<?php if (isset($_SESSION['user'])) { ?>

  <script>


  $('#menu-trigger').on('click',function(){
    $('.contr-submenu').css('display','');
  });

  $('div.contr-submenu').find('input').on('click',function(){
    $('.contr-submenu').css('display','block');
  });

  var initEditor = function(){

    tinymce.init({
      selector: ".ec",
        theme: "modern",
        add_unload_trigger: false,
        schema: "html5",
        inline: true,
        plugins: [
          "link lists"
        ],
        forced_root_block : false,
        <?php echo 'de' == $this->lang?'language : \'de\',':'' ?>
        toolbar: "undo redo  | bold italic link | bullist numlist ", //alignleft aligncenter alignright alignjustify |
        statusbar: false,
        menubar : false
      });

    $('.ec').addClass('bc-e-text');

    tinymce.init({
      selector: ".ecl",
      theme: "modern",
      add_unload_trigger: false,
      schema: "html5",
      inline: true,
      forced_root_block : false,
      <?php echo 'de' == $this->lang?'language : \'de\',':'' ?>
      toolbar: "undo redo",
      statusbar: false,
      menubar : false
    });

    $('.ecl').addClass('bc-e-text');

    // upload
    $('.ajax').each(function(){

      var jNode = $(this);
      jNode.removeClass('ajax');

      jNode.on('click',function(){
        $.ajax({
          'url':jNode.attr('href'),
          'data': {'ajax':'true'},
          'success':function(data, textStatus, jqXHR){

            if ('string' == typeof data) {
              data = $.parseJSON(data);
            }

            if(jNode.attr('data-callback')){
              window.bc_callbacks[jNode.attr('data-callback')](jNode,data);
            }
          }
        });
        return false;
      });

    });

    // upload
    $('.dz').each(function(){

      var jNode = $(this);
      jNode.removeClass('dz');

      jNode.dropzone({
        url: '<?php echo $this->cmsLink($this->activePage) ?>/upload',
        uploadMultiple: false,
        paramName: jNode.attr('data-zone'),
        clickable: this,
        //forceFallback: true,
        addRemoveLinks: true,
        maxThumbnailFilesize:5,
        previewsContainer: '#upload-preview',
        init: function() {
          this.on("processing", function(file) {

            if(jNode.attr('data-params')){
              this.options.url = '<?php echo $this->cmsLink($this->activePage) ?>/upload?ajax=true&'+jNode.attr('data-params');
            } else {
              this.options.url = '<?php echo $this->cmsLink($this->activePage) ?>/upload?ajax=true';
            }

            console.log('upload url '+this.options.url );
          });
        },
        success:function(file, response){
          if(jNode.attr('data-callback')){

            var jsonResp = $.parseJSON(response);

            window.bc_callbacks[jNode.attr('data-callback')](jNode,jsonResp);
          }
          //$R.handelSuccess($S.parseXML(response));
        }
      });

      jNode.find('.dz-default.dz-message').remove();
    });

    $('.dzl').each(function(){

      jNode = $(this);
      jNode.removeClass('dzl');

      jNode.dropzone({
        url: '<?php echo $this->cmsLink($this->activePage) ?>/upload?ajax=true',
        uploadMultiple: true,
        paramName: jNode.attr('data-zone'),
        clickable: this,
        //forceFallback: true,
        addRemoveLinks: true,
        maxThumbnailFilesize:5,
        previewsContainer: '#upload-preview',
        success:function(file, response){

          //$R.handelSuccess($S.parseXML(response));
        }
      });

      jNode.find('.dz-default.dz-message').remove();
    });

  };



    $(document).ready(function(){

      initEditor();

      // save the page
      $('#save-page').on('click',function(){

        var data = {};
        $('.bc-e-text').each(function(){
          data[$(this).attr('data-key')] = $(this).html();
        });

        $('.bc-e-list').each(function(){

          var listKey = $(this).attr('data-key');
          data[listKey] = [];

          $(this).find('li').each(function(){
            data[listKey].push($(this).html());
          });

        });

        $.post( "<?php echo $this->cmsLink($this->activePage) ?>/save?ajax=true", data );
        jSuccess('Die Seite wurden gespeichert',{
    		  autoHide : true, // added in v2.0
    		  clickOverlay : false, // added in v2.0
    		  MinWidth : 250,
    		  TimeShown : 1500,
    		  ShowTimeEffect : 200,
    		  HideTimeEffect : 200,
    		  LongTrip :20,
    		  HorizontalPosition : 'left',
    		  VerticalPosition : 'bottom',
    		  ShowOverlay : true,
    		  ColorOverlay : '#000',
    		  OpacityOverlay : 0.5,
    		  onClosed : function(){ // added in v2.0
    			},
    		  onCompleted : function(){ // added in v2.0
    			}
    		});

      });

    });


    window.setInterval(function(){$('.mce-resizehandle').hide();},300);
    //window.setTimeout(function(){$('.mce-resizehandle').hide();},300);

  </script>

<?php } ?>