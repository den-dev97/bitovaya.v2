$input_img = $('#img');
$label_upload = $('#upload');
$table_preview = $('#preview');
$preview_img = $('#preview_img');
$preview_filename = $('#preview_filename');
$preview_filesize = $('#preview_filesize');
$preview_delete = $('#preview_delete');
$form_upload = $('#add_form');
$table_orders = $('#table_orders');
$table_products = $('#table_products');
$tbody_products = $('#table_products tbody');


/*$table_orders.hide();
$table_products.hide();
$input_img.hide();
$table_preview.hide();*/




$('#add_btn').on('click', function (e) {
  e.preventDefault();
  $data = $form_upload.serializeArray();
  $name_atr_img = $input_img.attr('name');
  $data.push({ name: $name_atr_img, value: $input_img[0].files[0] })
  var formData = new FormData();
  for ($i = 0; $i < $data.length; $i++) {
    formData.append($data[$i].name, $data[$i].value);
  }
  formData.append($name_atr_img, $('#img')[0].files[0]);

  if (validateForm('#add_form')) {
    $.ajax({
      url: "../ajax/admin/load_product.php",
      method: "post",
      data: formData,
      dataType: 'json',
      processData: false,
      contentType: false,
      success: function (data) {
        replaceProducts(data);
      },
      error: function (e) {
        //error
      }
    });
  }
})


function replaceProducts(data = null) {
  if (!data) {
    $.ajax({
      url: "../ajax/admin/get_products.php",
      method: "get",
      data: '',
      dataType: 'json',
      processData: false,
      contentType: false,
      success: function (data) {
        ;
        replaceProducts(data)
      },
      error: function (e) {

      }
    });
  }
  $table_products.hide(500);
  $tbody_products.empty();
  if (!data) return;
  for (i = 0; i < data.length; i++) {
    var b = `<tr>
              <td><img width="70" height="70" src="/assets/pic/${data[i].img}"></td>
              <td>${data[i].title}</td>
              <td>${data[i].description}</td>
              <td>${data[i].category}</td>
              <td>${data[i].price}</td>
              <td>${data[i].sale}</td>
              <td>${data[i].popular}</td>
              <td>${data[i].gender}</td>
              <td style="width:50px">
                <button type="button" class="button delete_product" data-id="${data[i].id}">
                    <span class="icon is-small">
                        <i class="fa fa-trash-alt" aria-hidden="true"></i>
                    </span>
                </button>
              </td>
            <tr>`
    $tbody_products.append($(b))
    $table_products.show(500);
  }
  $('.delete_product').on('click', function () {
    $.ajax({
      url: "../ajax/admin/delete_product.php",
      method: "post",
      data: {id: $(this).data('id')},
      dataType: 'json',
      success: function (data) {
        console.log(data)
        replaceProducts(data)
      },
      error: function (e) {

      }
    });
  })
}

replaceProducts();




function validateForm($formSelector) {
  let formValid = true;
  $fields = $('input[type=text],input[type=number],textarea', $formSelector)
  $fields.each(function () {
    $val = $.trim($(this).val());
    $error = $($(this).parents('.field').get(0)).find('.help');
    $tagName = $(this).prop('tagName');
    $inputType = $(this).attr('type');

    if ($tagName === 'TEXTAREA' && $val.length < 10) {
      $error.text('Заполните поле не менее 10 символов')
      $(this).addClass('is-danger')
      formValid = false
    }

    if ($tagName === 'INPUT' && $inputType === 'number') {
      if (!Number.isInteger(Number($val)) || Number($val) === 0) {
        $error.text('Введите числовое значение > 0')
        $(this).addClass('is-danger')
        formValid = false
      }
    }

    if ($tagName === 'INPUT' && $inputType === 'text') {
      if ($val.length < 4) {
        $error.text('Введите значение больше четырёх символов')
        $(this).addClass('is-danger')
        formValid = false
      }
    }
  })

  if ($input_img[0].files.length === 0) {
    $error_img = $($input_img.parents('.field').get(0)).find('.help');
    $error_img.text('Не выбран файл')
    formValid = false
  } else {
    $error_img = $($input_img.parents('.field').get(0)).find('.help');
    $error_img.text('')
  }

  return formValid;
}



function validateFormBlur($fields) {
  $fields
    .blur(function () {
      $val = $.trim($(this).val());
      $error = $($(this).parents('.field').get(0)).find('.help');
      $tagName = $(this).prop('tagName');
      $inputType = $(this).attr('type');

      if ($tagName === 'TEXTAREA' && $val.length < 10) {
        $error.text('Заполните поле не менее 10 символов')
        $(this).addClass('is-danger')

      }

      if ($tagName === 'INPUT' && $inputType === 'number') {
        if (!Number.isInteger(Number($val)) || Number($val) === 0) {
          $error.text('Введите числовое значение > 0')
          $(this).addClass('is-danger')
        }
      }

      if ($tagName === 'INPUT' && $inputType === 'text') {
        if ($val.length < 4) {
          $error.text('Введите значение больше четырёх символов')
          $(this).addClass('is-danger')
        }
      }

    })
    .focus(function () {
      $($(this).parents('.field').get(0)).find('.help').text('')
      $(this).removeClass('is-danger')
    })
}

validateFormBlur($('input,textarea', '#add_form'));

$input_img.on('change', function () {
  $files = $(this)[0].files
  updateImageDisplay($files);
})

$preview_delete.on('click', function () {
  $input_img.val('');
  $preview_img.empty();
  $preview_filename.empty();
  $preview_filesize.empty();
  $table_preview.hide();
})


function validFileType(file) {
  var fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
  ]

  for (var i = 0; i < fileTypes.length; i++) {
    if (file.type === fileTypes[i]) {
      return true;
    }
  }
  return false;
}

function returnFileSize(number) {
  if (number < 1024) {
    return number + 'bytes';
  } else if (number > 1024 && number < 1048576) {
    return (number / 1024).toFixed(1) + 'KB';
  } else if (number > 1048576) {
    return (number / 1048576).toFixed(1) + 'MB';
  }
}


function updateImageDisplay($files) {
  $preview_img.empty();
  $preview_filename.empty();
  $preview_filesize.empty();
  $table_preview.hide();
  $error_img = $($input_img.parents('.field').get(0)).find('.help');
  $error_img.text('');
  if ($files.length === 0) {

  } else {
    for (var i = 0; i < $files.length; i++) {
      if (validFileType($files[i])) {
        var src = window.URL.createObjectURL($files[i]);
        $preview_img.append($(`<img src=${src} width="100" "height=100">`));
        $preview_filename.append($files[i].name);
        $preview_filesize.append(returnFileSize($files[i].size));
        $table_preview.show();
      } else {
        var error = 'Файл ' + $files[i].name + ' недопустимого формата';
        $input_img.val('');
      }
    }
  }
}




