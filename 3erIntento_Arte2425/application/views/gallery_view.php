<!DOCTYPE html>
<html>
<head>
    <title>Galería de Exposiciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .artwork-image {
            max-width: 300px;
            height: auto;
            margin: 10px;
        }
        .exhibition-section {
            margin-bottom: 40px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        .artwork-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px 0;
        }
        .artwork-card {
            width: 300px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <?php if(empty($exhibitions)): ?>
            <div class="alert alert-info">No hay exposiciones disponibles.</div>
        <?php else: ?>
            <?php foreach($exhibitions as $exhibition): ?>
                <div class="exhibition-section">
                    <h2 class="mb-3"><?php echo $exhibition['name_exh']; ?></h2>
                    <p><strong>Descripción:</strong> <?php echo $exhibition['description_exh']; ?></p>
                    <p><strong>Fecha:</strong> <?php echo date('d/m/Y', strtotime($exhibition['dateini'])); ?> - 
                                              <?php echo date('d/m/Y', strtotime($exhibition['dateend'])); ?></p>
                    <p><strong>Ubicación:</strong> <?php echo $exhibition['location']; ?></p>
                    
                    <div class="artwork-container">
                        <?php foreach($exhibition['artworks'] as $artwork): ?>
                            <div class="card artwork-card">
                                <img src="<?php echo base_url('uploads/' . $artwork['photo_art']); ?>" 
                                     class="card-img-top" 
                                     alt="<?php echo $artwork['name_art']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $artwork['name_art']; ?></h5>
                                    <p class="card-text"><?php echo $artwork['description_art']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>