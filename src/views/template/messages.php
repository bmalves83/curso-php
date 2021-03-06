<?php
    $errors = [];

    if($exception) :
        $message = [
            'type' => 'error',
            'message' => $exception->getMessage()
        ];

        if(get_class($exception) === 'ValidationException'){
            $errors = $exception->getErrors();
        }

        $alertType = '';
        if($message['type'] === 'error'){
            $alertType = 'danger';
        } else {
            $alertType = 'success';
        }
?>
    <div class="my-3 alert alert-<?php echo $alertType; ?>" role="alert">
        <?php echo $message['message']; ?>
    </div>
<?php endif;  ?>