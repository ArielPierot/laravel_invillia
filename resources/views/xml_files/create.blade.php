<link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css')  }}">
<link rel="stylesheet" href="{{ asset('dropzone/dropzone.css')  }}">

<div id='drop_zone'>
    <form action="{{route('xml.store')}}" class="dropzone" id="file">
        @csrf
    </form>
</div>

<script src="{{ asset('jquery-3.4.1.min.js')  }}" rel="script"></script>
<script src="{{ asset('bootstrap/bootstrap.min.js')  }}" rel="script"></script>
<script src="{{ asset('dropzone/dropzone.js')  }}" rel="script"></script>

<script>

    Dropzone.autoDiscover = false;
    $("#file").dropzone({
        init: function() {
            this.on("error", function(file, responseText) {
                alert(responseText.error);
            });
        },
        paramName: "file",
        autoProcessQueue : true,
    });
</script>
