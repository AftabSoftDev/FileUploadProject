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
                        <form id="fileUpload" action="{{ route('file-upload') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="progress" id="progress" style="display: none;">
  <div class="progress-bar" role="progressbar" id="upload-progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>