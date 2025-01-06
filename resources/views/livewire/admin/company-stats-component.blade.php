<div>
    <section id="company_stats">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Company Stats</h6>
                    </div>
                    <div class="card-body">
                        
                        @if (Session::has('message'))
                            <div class="col-sm-12 mb-3">
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-success">Success</span> {{Session::get('message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        
                        <form action="#" wire:submit.prevent='saveStat' method="post">
                            <div class="form-group">
                                <label for="company_name">Years Of Glory</label>
                                <input type="text" class="form-control" wire:model='years_of_glory'>
                            </div>
                            <div class="form-group">
                                <label for="company_name">Happy Clients</label>
                                <input type="text" class="form-control" wire:model='happy_clients'>
                            </div>
                            <div class="form-group">
                                <label for="company_name">Ads Spend</label>
                                <input type="text" class="form-control" wire:model='ads_spend'>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
