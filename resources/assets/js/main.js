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
      name: customerBox.find('[data-name]').data('name'),
      address: customerBox.find('[data-address]').data('address'),
      phone: customerBox.find('[data-phone]').data('phone'),
      points: customerBox.find('[data-points]').data('points'),
      admin: customerBox.find('[data-admin]').data('admin')
    };

    // Fix the form url
    var idPath = form.attr('action').replace(/[^\/]+$/, details.id);
    form.attr('action', idPath);

    // Fill default details
    modal.find('#name').val(details.name);
    modal.find('#phone_number').val(details.phone);
    modal.find('#address').val(details.address);
    modal.find('#points').val(details.points);
    modal.find('#admin').prop('checked', details.admin);

    submitBtn.on('click', function() {
      form.submit();
      modal.hide();
    });
  });

  $('#delete-modal').on('show.bs.modal', function(event) {
    var sourceBtn = $(event.relatedTarget);
    var target =  window.location.protocol + "//" + window.location.host + '/api/' + sourceBtn.data('type') + '/' + sourceBtn.data('id');

    var modal = $(this);
    var submitBtn = modal.find('#confirm-delete');

    var deleteForm = modal.find('#delete-form');
    deleteForm.attr('action', target);

    submitBtn.on('click', function() {
      deleteForm.submit();
      modal.hide();
    });
  });

  // DVD create form buttons
  $(document).on('click', '#addGenre',function(event) {
    var btnContainer = $(this).parent();
    helpers.cloneFormInput(btnContainer);    
    event.preventDefault();
  });

  $(document).on('click', '#addProducer',function(event) {
    var btnContainer = $(this).parent();
    helpers.cloneFormInput(btnContainer);    
    event.preventDefault();
  });

  $(document).on('click', '#addLanguage',function(event) {
    var btnContainer = $(this).parent();
    helpers.cloneFormInput(btnContainer);    
    event.preventDefault();
  });

  $(document).on('click', '#addSubtitle',function(event) {
    var btnContainer = $(this).parent();
    helpers.cloneFormInput(btnContainer);    
    event.preventDefault();
  });

  $(document).on('click', '#addActor',function(event) {
    var btnContainer = $(this).parent();
    helpers.cloneFormInput(btnContainer);    
    event.preventDefault();
  });

  var helpers = {
    cloneFormInput: function(btn) {
      var group = btn.parent();
      var copy = group.clone();

      btn.remove();
      copy.insertAfter(group);
    }
  };

  // Admin dvd buttons
  $('#create-dvd-modal').on('show.bs.modal', function(event) {
    var modal = $(this);
    var form = modal.find('#create-dvd-form');

    $('#create-dvd-submit').on('click', function(event) {
      form.submit();
      modal.hide();
    });
  });

  // Update dvd info
  $('#dvd-edit-modal').on('show.bs.modal', function(event) {
    var modal = $(this);
    var form = modal.find('#dvd-edit-form');
    var submit = modal.find('#edit-dvd-modal-submit');

    var dvdBox = $(event.relatedTarget).parent();
    
    var details = {
      id: dvdBox.data('id'),
      title: dvdBox.find('[data-title]').data('title'),
      length: dvdBox.find('[data-length]').data('length'),
      description: dvdBox.find('[data-description]').data('description'),
      price_whole: dvdBox.find('[data-price-whole]').data('price-whole'),
      price_cents: dvdBox.find('[data-price-cents]').data('price-cents'),
      fee_whole: dvdBox.find('[data-fee-whole]').data('fee-whole'),
      fee_cents: dvdBox.find('[data-fee-cents]').data('fee-cents'),
      discount: dvdBox.find('[data-discount]').data('discount'),
      points: dvdBox.find('[data-points]').data('points'),
      stock: dvdBox.find('[data-stock]').data('stock'),
      age_restriction:  dvdBox.find('[data-age-restriction]').data('age-restriction'),
    };

    // Fix the form url
    var idPath = form.attr('action').replace(/[^\/]+$/, details.id);
    form.attr('action', idPath);

    for (var detail in details) {
      if (detail === 'id') continue;

      modal.find('#' + detail).val(details[detail]);
    }

    submit.on('click', function() {
      form.submit();
      modal.hide();
    });
  });

  // Rental buttons
  $("#create-rental-modal").on('show.bs.modal', function() {
    var modal = $(this);
    var form = modal.find('#create-rental-form');
    var submitBtn = modal.find('#create-rental-modal-submit');

    submitBtn.on('click', function() {
      form.submit();
      modal.close();
    });
  });
})()
