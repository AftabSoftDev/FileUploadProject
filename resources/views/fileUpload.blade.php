<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <b>Users Table</b><br> --}}
                    <a href="{{ route('dashboard') }}"><button type="button"
                            class="btn btn-secondary mb-4  float-right">Back</button></a>
                    <div class="container">
                        <form id="fileUpload">
                            @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload CSV</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="uploaded_file" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" accept=".csv">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4 float-right" name="submit">Upload</button>
                        </form>
                        <div id="progressBar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#fileUpload').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: "{{ route('file-upload')}}",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener('progress', function(event) {
                if (event.lengthComputable) {
                    var percent = Math.round((event.loaded / event.total) * 100);
                    $('#progressBar').text(percent + '%').css('width', percent + '%');
                }
            });
            return xhr;
        },
        success: function(response) {
            // Handle success response
        },
        error: function(xhr, status, error) {
            // Handle error
        }
    });
});

        </script>
</x-app-layout>