<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <form>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="">Main Category</label>
                <select class="custom-select custom-select-lg mb-3" onchange="getSubCat(this.value)" id="main_category">
                    <option selected>Open this select menu</option>
                    <?php foreach ($categories as $category):?>
                    <option value="<?php echo $category->id ?>"><?php echo $category->name;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
    </form>
    <footer>
        <div class="environment">

            <p>Page rendered in {elapsed_time} seconds</p>

            <p>Environment: <?= ENVIRONMENT ?></p>

        </div>
    </footer>
</div>


<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
    function getSubCat(val) {
        $.post( "<?php echo base_url()?>" + 'index.php/welcome/get_subCategory',{ id: val }, function( data ) {
            var html = '';
            var data = JSON.parse(data);
            console.log(data.length)
            html = '<div class="form-group col-md-3 sub_category"><label for="">Sub Category</label>'+
                   '<select class="custom-select custom-select-lg mb-3" onchange="getSubCat(this.value)" id="sub_category'+val+'">'
                    +'<option value="">select</option>';
                        data.forEach( el=>{
                              html += '<option value="' + el.id + '">' +el.name + '</option>';
                        });
            html+='</select></div>';
            if (data.length>0)
            $(".row").append(html );
        });
    }
</script>

<!-- -->

</body>
</html>
