@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                
                <form >
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <button type="button" onclick="payWithPaystack()"> Fund Wallet </button> 
                </form>
 
                <script>
                  function payWithPaystack(){
                    var handler = PaystackPop.setup({
                      key: 'pk_test_23ec90ffc5c6b43b0a675a98c24605aee6cc26b3',
                      email: 'customer@email.com',
                      amount: 10000,
                      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                      metadata: {
                         custom_fields: [
                            {
                                display_name: "Mobile Number",
                                variable_name: "mobile_number",
                                value: "+2348012345678"
                            }
                         ]
                      },
                      callback: function(response){
                          alert('success. transaction ref is ' + response.reference);
                      },
                      onClose: function(){
                          alert('window closed');
                      }
                    });
                    handler.openIframe();
                  }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
