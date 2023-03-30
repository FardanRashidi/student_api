<?php

echo "

<form action=\"{{ route('users.import') }}\" method=\"POST\" enctype=\"multipart/form-data\">
                @csrf
                <input type=\"file\" name=\"file\" class=\"form-control\">
                <br>
                <button class=\"btn btn-primary\">Import User Data</button>
            </form>

";