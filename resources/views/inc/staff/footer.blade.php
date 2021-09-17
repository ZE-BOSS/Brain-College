						<div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>
                                    	<?php 
                                            use App\Model\site;

                                            $site = site::find(1);

                                            echo $site->footer;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>