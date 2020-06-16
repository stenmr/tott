

$('.minus').on('click', function(e) {
    e.preventDefault();
    let $this = $(this);
    let $input = $this.closest('div').find('input');
    let value = parseInt($input.val());

    if (value > 1) {
        value = value - 1;
    } else {
        value = 0;
    }

$input.val(value);

});

$('.plus').on('click', function(e) {
    e.preventDefault();
    let $this = $(this);
    let $input = $this.closest('div').find('input');
    let value = parseInt($input.val());

    if (value < 100) {
      value = value + 1;
    } else {
        value =100;
    }

    $input.val(value);
});

