import json
import urllib
from django.http import HttpResponse
from django.shortcuts import render

def index(request):
    url ="https://api.themoviedb.org/3/movie/now_playing?api_key=20e59fa0e07a0ca416d20b5cf6a66ec8&language=es-MX"
     
    try:
       respond = urllib.request.urlopen(url)
       datos = json.loads(respond.read().decode())

       movies = datos["results"]
    
       '''for movie in datos.get('results',[]):
           movieInfo = {
               'title': movie.get('title','No title'),
               'overview': movie.get('overview','No Overview'),
               'poster_path': movie.get('poster_path',''),
           }
         movies.append(movieInfo)'''
       return render(request, 'index.html',{'movies': movies})
    except urllib.error.URLError as e:
        return HttpResponse("Error")