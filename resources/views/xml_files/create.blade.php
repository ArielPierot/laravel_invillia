<link rel="stylesheet" href="{{ asset('dropzone/dropzone.css')  }}">
<div id="simpleform">

    <form action="{{route("xml.store")}}" class="dropzone">
        @csrf
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
</div>

<script src="{{ asset('dropzone/dropzone.js')  }}" rel="script"></script>
