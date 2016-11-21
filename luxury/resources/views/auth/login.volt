{# auth\signin.volt #}
{% extends "templates/layout.volt" %}

{% block title %}Sign in{{ super() }}{% endblock %}

{% block content %}
    <div class="container">
        <h1>Login</h1>
        {{ form('/login', 'method': 'post', 'class' : 'form-horizontal') }}
        <fieldset>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Username/Email</label>
                <div class="col-sm-10">
                    {{ text_field('email', 'class' :'form-control', 'placeholder': 'Username/Email', 'required': 'true') }}
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    {{ password_field('password',  'class' :'form-control', 'placeholder': 'Password', 'required': 'true') }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ submit_button('Login',  'class' :'btn btn-default') }}
                </div>
            </div>
        </fieldset>
        {{ end_form() }}
    </div>
{% endblock %}