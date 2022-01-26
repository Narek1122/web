@extends('app.master')

@section('title')


    Admin profile page
@endsection

@section('content')
    <h1>Admin profile page</h1>
    <div class="row">
        @foreach($datas as $data)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <h5>{{$data->email}}</h5>

                    <div class="card-body">
                        <input type="text" value="{{$data['name']}}" onchange="changeName({{$data['id']}},this.value)">
                    </div>
                </div>
            </div>

        @endforeach
    </div>


@endsection


@section('script')
    <script>

        async function ajxReq(id,value){
            let user = {
                id: id,
                name: value
            };

            let response = await fetch("{{url('api/admin-change-user-data')}}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(user)
            });

            let result = await response.json();
            console.log(result)
        }
         function changeName(id,value){
             ajxReq(id,value)
        }
    </script>
@endsection
