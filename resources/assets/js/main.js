(function() {
  'use strict';

  $('#create-customer-modal').on('show.bs.modal', function (event) {
    var modal = $(this);
    var submitBtn = modal.find('#modal-submit');
    var form = modal.find('#create-customer-form');
    var nameField = modal.find('#name');

    $(document).delegate(submitBtn, 'click', function() {
      if (nameField.val().length >= 2) {
        form.submit();
        modal.hide();
      }
    });
  });

})()