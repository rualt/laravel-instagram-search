<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <h2>Search instagram by tag</h2>
        <form action="index.php" method="get">
            <p><input type="search" name='tag' value="{{ tag }}" placeholder="Tag"> 
                <input type="submit" value="Search">
            </p>
        </form>
            <p>
            {% if images is defined %}
                <div id="_container-images">
                    {% for image in images %}
                        <img src="{{image}}">
                    {% endfor %}
                </div>
            {% endif %}
    </body>
</html>
