@if($model->getUsername() == 'mark')
        <h3>Mark you have logged in successfully.</h3>
    @else
        <h3>Someone besides Mark logged in successfully.</h3>
    @endif



