@extends('layout.main')
@section('title','Admin | New Release Version')
@section('content')

    <div class="mt-3 mb-3" id="errorMessage"></div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" >
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Cuurent Version -->
    @if (!$versionUpgradeData['alert_version_upgrade_enable'])
        <section id="oldVersionSection" class="container mt-5 text-center">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center text-info">Your current version is <span>{{env('VERSION')}}</span></h4>
                        <p>Please wait for upcoming version</p>
                    </div>
                </div>
        </section>
    @else
        <!-- For New Version -->
        <section id="newVersionSection" class="container mt-5 text-center">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center text-success"> A new version <b>{{ $versionUpgradeData['demo_version'] }}</b> has been released.</h4>
                    <p>Before upgrading, we highly recomended you to keep a backup of your current script and database.</p>
                </div>
            </div>

                <div class="d-flex justify-content-center mt-3 mb-3">
                    <div id="spinner" class="d-none spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <form action="{{route('version-upgrade')}}" method="post">
                    @csrf
                    <button type="submit" class="mt-5 mb-5 btn btn-primary btn-lg">Upgrade</button>
                </form>

        </section>
    @endif
@endsection
