jQuery(document).ready(function() {
  $('.select_checkbox').click(function() {
    event.stopPropagation();
    event.stopImmediatePropagation();

    let action = "update_selection_status";
    let dtaskid = jQuery(this).data('dtaskid');
    let username = jQuery(this).data('username');
    let checkbox_value;
    if(jQuery(this).is(":checked")) {
      checkbox_value = "SELECTED";
    } else {
      checkbox_value = "NOT SELECTED";
    }
    console.log(checkbox_value);
    jQuery.ajax({
      type: 'POST',
      url: 'main/scripts/seat_allotment_script.php',
      data: {
        action: action,
        dtaskid: dtaskid,
        checkbox_value: checkbox_value
      },
      dataType: 'json',
      success: function(res) {
        $('#selection_status_title').html("SELECTION STATUS");
        if(checkbox_value == "NOT SELECTED") {
          $('#selection_status_body').html("<b>" + username + "</b> have not been <b>Selected</b>.");
        } else if(checkbox_value == "SELECTED") {
          $('#selection_status_body').html("<b>" + username + "</b> have been <b>Selected</b>.");
        }
        $('.toast').toast('show');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  });

  $('.select_branch').change(function() {
    event.stopPropagation();
    event.stopImmediatePropagation();

    let action = "update_alloted_branch";
    let dtaskid = jQuery(this).data('dtaskid');
    let username = jQuery(this).data('username');
    let selected_branch = jQuery(this).val();
    console.log(selected_branch);
    jQuery.ajax({
      type: 'POST',
      url: 'main/scripts/seat_allotment_script.php',
      data: {
        action: action,
        dtaskid: dtaskid,
        selected_branch: selected_branch
      },
      dataType: 'json',
      success: function(res) {
        $('#selection_status_title').html("ALLOTMENT STATUS");
        $('#selection_status_body').html("<b>" + username + "</b> have been alloted <b>" + selected_branch + "</b> Branch.");
        $('.toast').toast('show');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  });

  $('.verify-btn').click(function() {
    event.stopPropagation();
    event.stopImmediatePropagation();

    let action = "verify_sem_fee_status";
    let dtaskid = jQuery(this).data('dtaskid');
    jQuery.ajax({
      type: 'POST',
      url: 'main/scripts/seat_allotment_script.php',
      data: {
        action: action,
        dtaskid: dtaskid,
      },
      dataType: 'json',
      success: function(res) {
        location.reload();
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  });

});
