/* Shivving (IE8 is not supported, but at least it won't look as awful)
/* ========================================================================== */

(function (document) {
  var
    head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
    elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
    elementsLength = elements.length,
    elementsIndex = 0,
    element;

  while (elementsIndex < elementsLength) {
    element = document.createElement(elements[++elementsIndex]);
  }

  element.innerHTML = 'x<style>' +
    'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
    'audio[controls],canvas,video{display:inline-block}' +
    '[hidden],audio{display:none}' +
    'mark{background:#FF0;color:#000}' +
    '</style>';

  return head.insertBefore(element.lastChild, head.firstChild);
})(document);

/* Prototyping
/* ========================================================================== */

(function (window, ElementPrototype, ArrayPrototype, polyfill) {
  function NodeList() {
    [polyfill]
  }
  NodeList.prototype.length = ArrayPrototype.length;

  ElementPrototype.matchesSelector = ElementPrototype.matchesSelector ||
    ElementPrototype.mozMatchesSelector ||
    ElementPrototype.msMatchesSelector ||
    ElementPrototype.oMatchesSelector ||
    ElementPrototype.webkitMatchesSelector ||
    function matchesSelector(selector) {
      return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
    };

  ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll ||
    ElementPrototype.mozAncestorQuerySelectorAll ||
    ElementPrototype.msAncestorQuerySelectorAll ||
    ElementPrototype.oAncestorQuerySelectorAll ||
    ElementPrototype.webkitAncestorQuerySelectorAll ||
    function ancestorQuerySelectorAll(selector) {
      for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
        if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
      }

      return newNodeList;
    };

  ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector ||
    ElementPrototype.mozAncestorQuerySelector ||
    ElementPrototype.msAncestorQuerySelector ||
    ElementPrototype.oAncestorQuerySelector ||
    ElementPrototype.webkitAncestorQuerySelector ||
    function ancestorQuerySelector(selector) {
      return this.ancestorQuerySelectorAll(selector)[0] || null;
    };
})(this, Element.prototype, Array.prototype);

/* Helper Functions
/* ========================================================================== */
$(document).ready(function () {
  $('#select_plan').on('change', function () {
    //console.log($(this).val());
    $.ajax({
      type: 'get',
      url: '/getTaskDetails',
      data: {
        'task_id': $(this).val()
      },
      dataType: "json",
      success: function (response) {
        response.forEach(function (data) {
          //console.log(data.task_description);
          $('#addContractPlan .phase-id').val(data.phase_id);
          $('#addContractPlan .task-id').val(data.task_id);
          $('#addContractPlan .task-description').val(data.task_description);
          $('#addContractPlan .task-unit').val(data.task_unit);
          $('#addContractPlan .task-cost').val(data.task_unit_cost);
        })
      }
    });

  });
});

function generateTableRow() {
  var new_plan_id = document.getElementById("select_plan").value;
  var new_plan_description = document.getElementById("task-description").value;
  var new_plan_unit = document.getElementById("task-unit").value;
  var new_plan_cost = document.getElementById("task-cost").value;
  var new_plan_quantity = document.getElementById("task-quantity").value;
  var new_plan_price = document.getElementById("task-price").value;
  var new_plan_phase = document.getElementById("phase-id").value;

  //var table=document.getElementById("bill");
  // var table_len=(table.rows.length)-0;
  //var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='plan_id_row"+table_len+"'>"+new_plan_id+"</td><td id='plan_description_row"+table_len+"'>"+new_plan_description+"</td><td id='plan_unit_row"+table_len+"'>"+new_plan_unit+"</td><td id='plan_cost_row"+table_len+"'>"+new_plan_cost+"</td><td> <a href='#' class='btn btn-danger btn-xs' onclick='delete_row("+table_len+")'><i class='fa fa-trash-o'></i> Remove </a></td></tr>";

  //document.getElementById("plan_id").value="";
  //document.getElementById("plan_description").value="";
  //document.getElementById("plan_unit").value="";
  //document.getElementById("plan_cost").value="";


  if ($.trim(new_plan_id) == 'default') {
    alert("Please select the correct Plan Description");
  } else if ($.trim(new_plan_quantity) == '' || new_plan_quantity == 0) {
    alert("Please input a correct quantity");
  } else {
    var emptyColumn = document.createElement('tr');
    emptyColumn.innerHTML = '<td><span><a class="cut" ><i class="fa fa-trash-o"></i> Remove </a></span></td>' +
      '<td><span>' + new_plan_id + '</span></td><input type="hidden" name="planid[]" value="' + new_plan_id + '"/>' +
      '<td><span>' + new_plan_description + '</span></td>' +
      '<td><span>' + new_plan_unit + '</span></td>' +
      '<td><span>' + new_plan_cost + '</span></td>' +
      '<td><span>' + new_plan_quantity + '</span></td><input type="hidden" name="planquantity[]" value="' + new_plan_quantity + '"/>' +
      '<td><span></span></td><input type="hidden" name="planprice[]" value="' + new_plan_price + '"/><input type="hidden" name="planphase[]" value="' + new_plan_phase + '"/>';

    document.getElementById("task-id").value = "";
    document.getElementById("phase-id").value = "";
    document.getElementById("task-description").value = "";
    document.getElementById("task-unit").value = "";
    document.getElementById("task-cost").value = "0.00";
    document.getElementById("task-quantity").value = "0";
    document.getElementById("task-price").value = "0";
    $('#select_plan option[value="default"]').prop('selected', true);

    return emptyColumn;
  }
}

function parseFloatHTML(element) {
  return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;
}

function parsePrice(number) {
  return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1,');
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

/* Update Number
/* ========================================================================== */

function updateNumber(e) {
  var
    activeElement = document.activeElement,
    value = parseFloat(activeElement.innerHTML),
    wasPrice = activeElement.innerHTML == parsePrice(parseFloatHTML(activeElement));

  if (!isNaN(value) && (e.keyCode == 38 || e.keyCode == 40 || e.wheelDeltaY)) {
    e.preventDefault();

    value += e.keyCode == 38 ? 1 : e.keyCode == 40 ? -1 : Math.round(e.wheelDelta * 0.025);
    value = Math.max(value, 0);

    activeElement.innerHTML = wasPrice ? parsePrice(value) : value;
  }

  updateInvoice();
}

/* Update Invoice
/* ========================================================================== */

function updateInvoice() {
  var total = 0;
  var cells, price, total, a, i;

  // update inventory cells
  // ======================

  for (var a = document.querySelectorAll('table.bill tbody tr'), i = 0; a[i]; ++i) {
    // get inventory row cells
    cells = a[i].querySelectorAll('span:last-child');

    // set price as cell[2] * cell[3]
    price = parseFloatHTML(cells[4]) * parseFloatHTML(cells[5]);

    // add price to total
    total += price;

    // set row total
    cells[6].innerHTML = price;
  }

  // update balance cells
  // ====================

  // get balance cells
  cells = document.querySelectorAll('table.balance td:last-child span:last-child');

  total = Math.round(1000 * total) / 1000;
  // set total
  cells[0].innerHTML = numberWithCommas(total);
  document.getElementById("total").value = total;

  // set payment(15)
  var pay = total * .15;
  pay = Math.round(1000 * pay) / 1000;
  cells[1].innerHTML = pay;
  document.getElementById("paid").value = pay;

  // set balance and meta balance
  var bal = total - pay;
  bal = Math.round(1000 * bal) / 1000;
  var balance = cells[2].innerHTML = document.querySelector('table.meta tr:last-child td:last-child span:last-child').innerHTML = numberWithCommas(bal);
  document.getElementById("balance").value = balance.replace(/,/g, '');
  // update prefix formatting
  // ========================
}

/* On Content Load
/* ========================================================================== */

function onContentLoad() {
  updateInvoice();

  var
    input = document.querySelector('input'),
    image = document.querySelector('img');

  function onClick(e) {
    var element = e.target.querySelector('[contenteditable]'),
      row;

    element && e.target != document.documentElement && e.target != document.body && element.focus();

    if (e.target.matchesSelector('.add')) {
      document.querySelector('table.bill tbody').appendChild(generateTableRow());
    } else if (e.target.className == 'cut') {
      row = e.target.ancestorQuerySelector('tr');

      row.parentNode.removeChild(row);
    }

    updateInvoice();
  }

  function onEnterCancel(e) {
    e.preventDefault();

    image.classList.add('hover');
  }

  function onLeaveCancel(e) {
    e.preventDefault();

    image.classList.remove('hover');
  }

  function onFileInput(e) {
    image.classList.remove('hover');

    var
      reader = new FileReader(),
      files = e.dataTransfer ? e.dataTransfer.files : e.target.files,
      i = 0;

    reader.onload = onFileLoad;

    while (files[i]) reader.readAsDataURL(files[i++]);
  }

  function onFileLoad(e) {
    var data = e.target.result;

    image.src = data;
  }

  if (window.addEventListener) {
    document.addEventListener('click', onClick);

    document.addEventListener('mousewheel', updateNumber);
    document.addEventListener('keydown', updateNumber);

    document.addEventListener('keydown', updateInvoice);
    document.addEventListener('keyup', updateInvoice);

    input.addEventListener('focus', onEnterCancel);
    input.addEventListener('mouseover', onEnterCancel);
    input.addEventListener('dragover', onEnterCancel);
    input.addEventListener('dragenter', onEnterCancel);

    input.addEventListener('blur', onLeaveCancel);
    input.addEventListener('dragleave', onLeaveCancel);
    input.addEventListener('mouseout', onLeaveCancel);

    input.addEventListener('drop', onFileInput);
    input.addEventListener('change', onFileInput);
  }
}

window.addEventListener && document.addEventListener('DOMContentLoaded', onContentLoad);
