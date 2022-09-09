@extends('layout')

@section('title', 'Ajax Test')

@section('content')
    <h2>Ajax Test</h2>

    <div id="results"></div>
@endsection

@section('js')
    <script>
        fetch('{{ route('users') }}', {
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(res => res.json())
            .then(function(result) {
                // Once the AJAX call was made
                console.log(result);

                let htmlResult = '';
                result.forEach(element => {
                    htmlResult += element.first_name + '<br>' + element.last_name + '<hr>';
                });

                document.getElementById('results').innerHTML = htmlResult;
            });
    </script>
@endsection
