(function() {
  'use strict';

  $('#create-customer-modal').on('show.bs.modal', function (event) {
    var modal = $(this);
    var submitBtn = modal.find('#create-modal-submit');
    var form = modal.find('#create-customer-form');
    var nameField = modal.find('#name');

    submitBtn.on('click', function() {
      if (nameField.val().length >= 2) {
        form.submit();
        modal.hide();
      }
    });
  });

  $('#customer-edit-modal').on('show.bs.modal', function(event) {
    var modal = $(this);
    var submitBtn = modal.find('#edit-modal-submit');
    var form = modal.find("#customer-edit-form");

    var customerBox = $(event.relatedTarget.parentElement);

    var details = {
      id: customerBox.data('id'),
      email: customerBox.find('[data-email]').data('email'),
      address: customerBox.find('[data-address]').data('address'),
      phone: customerBox.find('[data-phone]').data('phone'),
      points: customerBox.find('[data-points]').data('points'),
      admin: customerBox.find('[data-admin]').data('admin')
    };

    // Fix the form url
    var idPath = form.attr('action').replace(/[^\/]+$/, details.id);
    form.attr('action', idPath);

    // Fill default details
    

    submitBtn.on('click', function() {
      form.submit();
      modal.hide();
    });
  });
})()