<!-- bootstrap progress js -->
<script src="<?php echo BaseURL() ?>/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo BaseURL() ?>/js/nicescroll/jquery.nicescroll.min.js"></script>

<!-- icheck -->
<script src="<?php echo BaseURL() ?>/js/icheck/icheck.min.js"></script>

<!-- daterangepicker -->
<script type="text/javascript" src="<?php echo BaseURL() ?>/js/moment/moment.min.js"></script>
<script type="text/javascript" src="<?php echo BaseURL() ?>/js/datepicker/daterangepicker.js"></script>

<script src="<?php echo BaseURL() ?>/js/custom.js"></script>

<!-- flot js -->
<script type="text/javascript" src="<?php echo BaseURL() ?>/js/flot/date.js"></script>

<!-- select2 full js -->
<script src="<?php echo BaseURL() ?>/js/select/select2.full.js"></script>

<!-- pace -->
<script src="<?php echo BaseURL() ?>/js/pace/pace.min.js"></script>

<!-- richtext editor -->
  <script src="<?php echo BaseURL() ?>/js/editor/bootstrap-wysiwyg.js"></script>
  <script src="<?php echo BaseURL() ?>/js/editor/external/jquery.hotkeys.js"></script>
  <script src="<?php echo BaseURL() ?>/js/editor/external/google-code-prettify/prettify.js"></script>

<!-- datepicker -->
<script type="text/javascript">
$(document).ready(function() {
  $('.xcxc').click(function() {
    $('#about, #responsible').val($('#editor').html());
  });

  var cb = function(start, end, label) {
	console.log(start.toISOString(), end.toISOString(), label);
	$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
  }


  var optionSet1 = {
	startDate: moment().subtract(29, 'days'),
	endDate: moment(),
	minDate: '01/01/2012',
	maxDate: '12/31/2015',
	dateLimit: {
	  days: 60
	},
	showDropdowns: true,
	showWeekNumbers: true,
	timePicker: false,
	timePickerIncrement: 1,
	timePicker12Hour: true,
	ranges: {
	  'Today': [moment(), moment()],
	  'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	  'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	  'This Month': [moment().startOf('month'), moment().endOf('month')],
	  'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	},
	opens: 'left',
	buttonClasses: ['btn btn-default'],
	applyClass: 'btn-small btn-primary',
	cancelClass: 'btn-small',
	format: 'MM/DD/YYYY',
	separator: ' to ',
	locale: {
	  applyLabel: 'Submit',
	  cancelLabel: 'Clear',
	  fromLabel: 'From',
	  toLabel: 'To',
	  customRangeLabel: 'Custom',
	  daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
	  monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
	  firstDay: 1
	}
  };
  $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
  $('#reportrange').daterangepicker(optionSet1, cb);
  $('#reportrange').on('show.daterangepicker', function() {
	console.log("show event fired");
  });
  $('#reportrange').on('hide.daterangepicker', function() {
	console.log("hide event fired");
  });
  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
	console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
  });
  $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
	console.log("cancel event fired");
  });
  $('#options1').click(function() {
	$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
  });
  $('#options2').click(function() {
	$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
  });
  $('#destroy').click(function() {
	$('#reportrange').data('daterangepicker').remove();
  });
});
    $(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('#voiceBtn').hide();
        }
      };

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      };
      initToolbarBootstrapBindings();
      $('#editor').wysiwyg({
        fileUploadError: showErrorAlert
      });
      window.prettyPrint && prettyPrint();
    });
</script>
<script>
NProgress.done();
</script>
