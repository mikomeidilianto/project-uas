<!-- foto slide -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('Admin') ?>/assets/img/buy1get1.png" class="d-block w-75 mt-5 mb-3 mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('Admin') ?>/assets/img/buy1get1.png" class="d-block w-75 mt-5 mb-3 mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('Admin') ?>/assets/img/buy1get1.png" class="d-block w-75 mt-5 mb-3 mx-auto" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



<!-- side bar dan menu -->
<div class="row mt-5" style="width: 200vh;">
    <div class="col-2" style=" margin-left: 85px !important;">
        <h4> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
            </svg> Semua Tenant</h4>
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-kopi_beska-list" data-bs-toggle="list" href="#list-beska" role="tab" aria-controls="list-beska">Kopi Beska</a>
            <a class="list-group-item list-group-item-action " id="list-uramen-list" data-bs-toggle="list" href="#list-uramen" role="tab" aria-controls="list-uramen">Uramen</a>
            <a class="list-group-item list-group-item-action " id="list-geprek_goo-list" data-bs-toggle="list" href="#list-geprek" role="tab" aria-controls="list-geprek">Geprek Goo</a>
            <a class="list-group-item list-group-item-action " id="list-ghurih-list" data-bs-toggle="list" href="#list-ghurih" role="tab" aria-controls="list-ghurih">Ghurih</a>
            <a class="list-group-item list-group-item-action " id="list-mauchurros-list" data-bs-toggle="list" href="#list-mauchurros" role="tab" aria-controls="list-mauchurros">Mauchurros</a>
            <a class="list-group-item list-group-item-action " id="list-mie_hap_hap-list" data-bs-toggle="list" href="#list-miehap" role="tab" aria-controls="list-miehap">Mie Hap Hap</a>
            <a class="list-group-item list-group-item-action " id="list-tuan_dawet_indonesia-list" data-bs-toggle="list" href="#list-dawet" role="tab" aria-controls="list-dawet">Tuan Dawet Indonesia</a>
            <a class="list-group-item list-group-item-action " id="list-my_honey-list" data-bs-toggle="list" href="#list-honey" role="tab" aria-controls="list-honey">My Honey</a>
        </div>
    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-beska" role="tabpanel" aria-labelledby="list-kopi_beska-list">
                <div class="col-md-9">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-uramen" role="tabpanel" aria-labelledby="list-uramen-list">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-geprek" role="tabpanel" aria-labelledby="list-geprek_goo-list">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-ghurih" role="tabpanel" aria-labelledby="list-ghurih-list">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-mauchurros" role="tabpanel" aria-labelledby="list-mauchurros-list">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-miehap" role="tabpanel" aria-labelledby="list-mie_hap_hap-list">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-dawet" role="tabpanel" aria-labelledby="list-tuan_dawet_indonesia-list">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-honey" role="tabpanel" aria-labelledby="list-my_honey-list">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>