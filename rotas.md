
GET|HEAD        / ................................ welcome  
GET|HEAD        ages .... ages.index › AgeController@index  
POST            ages .... ages.store › AgeController@store  
GET|HEAD        ages/create ...... ages.create › AgeController@create  
GET|HEAD        ages/{age}  ages.show › AgeController@show  
PUT|PATCH       ages/{age} ....... ages.update › AgeController@update  
DELETE          ages/{age} ..... ages.destroy › AgeController@destroy  
GET|HEAD        ages/{age}/edit ...... ages.edit › AgeController@edit  

GET|HEAD        catalogos ...................... catalogos  
GET|HEAD        componentes .................. componentes  
GET|HEAD        cos ....... cos.index › CoController@index  
POST            cos ....... cos.store › CoController@store  
GET|HEAD        cos/create ......... cos.create › CoController@create  
GET|HEAD        cos/{co} .... cos.show › CoController@show  
PUT|PATCH       cos/{co}  cos.update › CoController@update  
DELETE          cos/{co} ......... cos.destroy › CoController@destroy  
GET|HEAD        cos/{co}/edit .......... cos.edit › CoController@edit  
