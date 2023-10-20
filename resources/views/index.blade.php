<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Discount</title>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex flex-column">
            
            <h1 class="text-center">Discount Table</h1>
          
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="bg-dark text-white">Vendor</th>
                        <th class="bg-dark text-white">Trade A</th>
                        <th class="bg-dark text-white">Trade B</th>
                        <th class="bg-dark text-white">Trade C</th>
                        <th class="bg-dark text-white">Trade D</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($discount as $discounts)
                    <tr>
                        <td>{{$discounts->Vendor}}</td>
                        <td>{{$discounts->Trade_A}}</td>
                        <td>{{$discounts->Trade_B}}</td>
                        <td>{{$discounts->Trade_C}}</td>
                        <td>{{$discounts->Trade_D}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h1 class="text-center">Product Table</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="bg-dark text-white">#</th>
                        <th class="bg-dark text-white">Product_Name</th>
                        <th class="bg-dark text-white">Price</th>
                        <th class="bg-dark text-white">Tags</th>
                        <th class="bg-dark text-white">Vendor</th>
                        <th class="bg-dark text-white">Cart</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $products)
                    <tr>
                        <td>{{$products->id}}</td>
                        <td>{{$products->Product_Name}}</td>
                        <td>{{$products->Price}}</td>
                        <td>{{$products->Tags}}</td>
                        <td>{{$products->Vendor}}</td>
                        <td>
                            <a class="list-unstyled btn btn-success btn-sm"  href="{{url('post-save')}}/{{$products->id}}">
                                Add Cart
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h1 class="text-center">Shopping Cart</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="bg-dark text-white">#</th>
                        <th class="bg-dark text-white">Product_Name</th>
                        <th class="bg-dark text-white">OrgPrice</th>
                        <th class="bg-dark text-white">DiscountPercentage</th>
                        <th class="bg-dark text-white">DiscountPrice</th>
                        <th class="bg-dark text-white">Vendor</th>
                        <th class="bg-dark text-white">Cart</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shopping_cart as $shopping)
                    <tr>
                        <td>{{$shopping->id}}</td>
                        <td>{{$shopping->Product_Name}}</td>
                        <td>{{$shopping->OrgPrice}}</td>
                        <td>{{$shopping->DiscountPercentage}}</td>
                        <td>{{$shopping->DiscountPrice}}</td>
                        <td>{{$shopping->Vendor}}</td>
                        <td>
                            <a class="list-unstyled btn btn-danger btn-sm" href="{{url('post-delete')}}/{{$shopping->id}}" >
                                Remove Cart
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            
                <h1 class="text-center">Total Price: {{ $sum }}</h1>
            
       
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>