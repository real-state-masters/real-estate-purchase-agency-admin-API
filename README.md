

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
   ```
  
  {
"location": {
"id": 124234234,
"coordinates": [
234234.23,
141234.23
],
"address": "my street 23",
"context": {},
"property_id": 3
},
"type": "home", 
"type_house":"", // 0 -> duplex, 1->house, 2->penthouse
"area": 232,
"status": "true", // true -> not sold, false-> sold
"bought_by": "3423423", // int-> user_id, null/undefined/false -> not bought by anyone
"created_at": "",
"updated_at": "",
"price": 99999993,
"images": [], // array of url's
"description": "asfasdfsfd",
"num_bathrooms": 2,
"num_rooms": 3,
"pets": true,
"equipment":0, // 0-> Indifferent , 1-> fully fitted kitchen, 2-> furnished
"garden": false,
"swimming_pool":true,
"lift":true,
"condition": 0, // 0-> new homes, 1-> good condition , 2-> needs renovation
"air_condition":false,
"terrace":false,
"contact": 32423422, // admin email
"title": "The best one",
"building_use" : null // if type==office , then building use must be integer, else whatever // -> null , 0-> private, 1->co_working , 2-> security_system
}
      ```

    



