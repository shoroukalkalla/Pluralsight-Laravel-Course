{{--SUBVIEW--}}
<div class="flash-error">
    <b>There are some errors in your submission</b>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
