# honoring-choices-webapp
Support Advance Directive HealthCare

## Admin stuff:
* Robin needs to apply for azure account as a non-profit organization so she gets $5000 year (for free) tier
* Robin also needs to apply for aws account as a non-profit organization so she gets $2000 year (for free) tier
* "individuals" who upload pictures to our "web app" need to agree with azure's cognitive services fair usage, note no personally identifiable info is shared to azure cognitive services

## Tech stuff:
* faceId expires within an hour in the face/detect api
* S3 public bucket is used for storing the picture initially while face/detect api is called from the server side
* personGroupId is going to be just 1 for now, until we can make up our minds
* tech stack: angular, php laravel, postgres, redis, azure face api

## Backlog:
* Convert the datamodel to nosql
* Add face to person occasionally so as the "individual" ages we can verify
