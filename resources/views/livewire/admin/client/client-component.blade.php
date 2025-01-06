<div>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>

            <a href="{{ route('add.clients') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
        <div class="card-body">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Image Alt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clients as $key => $client )
                            <tr>
                                <td>{{  ++$key }}</td>
                                <td>
                                    <img width="70" src="{{ asset('assets/image/clients') ?? asset('assets/img/clients/no-image.jpg') }}/{{$client->image}}" class="img-fluid" alt="{{ $client->img_alt }}">
                                </td>
                                <td>{{ $client->img_alt ?? "N/A" }}</td>
                                <td>
                                    <a href="javascript:void(0)" wire:click.prevent="deleteClient({{ $client->id }})" wire:confirm="Are you sure you want to delete this client?"  class="btn btn-danger"  ><i class="fa fa-trash"></i></a>
                                    <a href="{{ route('edit.clients', $client->id) }}" class="btn btn-primary" >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Not Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
