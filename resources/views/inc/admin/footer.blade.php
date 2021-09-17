                                    <div class="footer">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <?php 
                                                        use App\Model\site;

                                                        $site = site::find(1);

                                                        echo $site->footer;
                                                    ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>