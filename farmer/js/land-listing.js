$(function () {
    $('.landUse').click(function () {
        if ($(this).is(':checked')) {

            switch ($(this).val()) {
                case "lease":
                    var optionText = '<label for="exampleInputPlaceholder">Lease value per month</label><input name="price" type="text" class="form-control" id="exampleInputPlaceholder" placeholder="US$" >';
                    $("#landUse").html(optionText);
                    break;

                case "sale":
                    var optionText = '<label for="exampleInputPlaceholder">Sale price</label><input name="price" type="text" class="form-control" id="exampleInputPlaceholder" placeholder="US$" >';
                    $("#landUse").html(optionText);

                    break;
                case "match graze":
                    var optionText = '<label for="exampleInputPlaceholder">Price per head</label><input name="price" type="text" class="form-control" id="exampleInputPlaceholder" placeholder="US$" >';
                    $("#landUse").html(optionText);
                    break;
                case "joint venture":
                    var optionText = '<label for="exampleInputPlaceholder">Land holder profit share per hactere</label><input name="price" type="text" class="form-control" id="exampleInputPlaceholder" placeholder="US$" >';
                    $("#landUse").html(optionText);
                    break;

                default:
                     var optionText = '';
                    $("#landUse").html(optionText);
                    break;
            }



        }
    });
});


// 
// 