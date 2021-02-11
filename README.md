

#  Backend admin site of the real state purchase agency


<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-3-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

## Contributors ✨


<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://tonijorda.com/"><img src="https://avatars.githubusercontent.com/u/49041487?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Antonio Jorda</b></sub></a><br /><a href="https://github.com/real-state-masters/real-estate-purchase-agency-admin-API/commits?author=Skebard" title="Code">💻</a> <a href="#infra-Skebard" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a> <a href="#ideas-Skebard" title="Ideas, Planning, & Feedback">🤔</a></td>
    <td align="center"><a href="https://github.com/IsmaelVazquez"><img src="https://avatars.githubusercontent.com/u/66822532?v=4?s=100" width="100px;" alt=""/><br /><sub><b>IsmaelVazquez</b></sub></a><br /><a href="https://github.com/real-state-masters/real-estate-purchase-agency-admin-API/commits?author=IsmaelVazquez" title="Code">💻</a></td>
    <td align="center"><a href="https://github.com/adrialloal"><img src="https://avatars.githubusercontent.com/u/67317486?v=4?s=100" width="100px;" alt=""/><br /><sub><b>adrialloal</b></sub></a><br /><a href="https://github.com/real-state-masters/real-estate-purchase-agency-admin-API/commits?author=adrialloal" title="Code">💻</a></td>
  </tr>
</table>


   


<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->




## Database

 For the database, mongoDB has been used. Below we can see the collections
 
 <br>

  Properties collection: 
  
  
  
   ```jsonc
  
  {
"location": { // type: object
      "id": 124234234, // type: int
      "coordinates": [
      234234.23,
      141234.23
      ],
      "address": "my street 23",  //  type: string
      "context": {},    // type:object
      "property_id": 3  // type:int
},
"type": "home",     // type: enum  (home/office)
"type_house":0, // type: int, -1-> not a house,  0 -> duplex, 1->house, 2->penthouse  
"area": 232, // type int ( m^²)
"status": true,  // type: boolean .  true -> not sold, false-> sold , 
"bought_by": 3423423, // type: int ( user_id).  if -1-> not bought by anyone
"created_at": , // type: date ( timestamp)
"updated_at": "", // type : date ( timestamp)
"price": 99999993,  // type: int 
"images": [], // array of url's  // type: array
"description": "asfasdfsfd",  // type:string
"num_bathrooms": 2, // type: int
"num_rooms": 3, // type: int
"pets": true,  // type: bool
"equipment":0, //  type: int 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished  
"garden": false, // type:bool
"swimming_pool":true, // type: bool
"lift":true, // type: bool
"condition": 0, // type: int , 0-> new homes, 1-> good condition , 2-> needs renovation
"air_condition":false, // type: bool
"terrace":false, // type: bool
"contact": 32423422, // admin email
"title": "The best one", // type: string
"building_use" :  // type:integer, -1-> not an office,  0-> private, 1->co_working , 2-> security_system
}
    
```

    



