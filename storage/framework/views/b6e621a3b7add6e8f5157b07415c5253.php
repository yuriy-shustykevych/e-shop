<div>
    <div>
        <div class="py-3 py-md-5">
            <!--[if BLOCK]><![endif]--><?php if($responseData): ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <div class="bg-white border">
                            <!--[if BLOCK]><![endif]--><?php if($responseData['Poster']): ?>
                                <img src="<?php echo e($responseData['Poster']); ?>" class="w-100" alt="Img">
                            <?php else: ?>
                                No Image Added
                            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="col-md-7 mt-3">
                        <div class="product-view">
                            <h4 class="product-name">
                                <?php echo e($responseData['Title']); ?>

                                <a href="<?php echo e(url('omdbapi')); ?>" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                            </h4>
                            <hr>
                            <div class="mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td><span class="fw-bold">Genre: </span></td>
                                                <td><?php echo e($responseData['Genre']); ?></td>
                                            </tr>
                                        <tr>
                                            <td><span class="fw-bold">Year: </span></td>
                                                <td><?php echo e($responseData['Year']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Director: </span></td>
                                                <td><?php echo e($responseData['Director']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Writer: </span></td>
                                                <td><?php echo e($responseData['Writer']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Actors: </span></td>
                                                <td><?php echo e($responseData['Actors']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Released: </span></td>
                                                <td><?php echo e($responseData['Released']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Runtime: </span></td>
                                                <td><?php echo e($responseData['Runtime']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Country: </span></td>
                                                <td><?php echo e($responseData['Country']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Rated: </span></td>
                                                <td><?php echo e($responseData['Rated']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">imdbRating: </span></td>
                                                <td><?php echo e($responseData['imdbRating']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Released: </span></td>
                                                <td><?php echo e($responseData['Released']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Runtime: </span></td>
                                                <td><?php echo e($responseData['Runtime']); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $responseData['Plot']; ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="bg-white">
                                <h4>No Film with this ID <a href="<?php echo e(url('omdbapi')); ?>" class="btn btn-danger btn-sm text-white float-end">BACK</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

</div>
<?php /**PATH /var/www/resources/views/livewire/omdbapi/view.blade.php ENDPATH**/ ?>