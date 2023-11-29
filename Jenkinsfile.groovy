#!/usr/bin/env groovy
def HTTP_PORT="8090"
def CONTAINER_TAG="latest"
def DOCKER_HUB_USER="narek305"
def CONTAINER_NAME="jenkins-pipeline"

node {
    stage("Checkout") {
        checkout scm
    }

//     stage("UnitTests") {
//         steps {
//            script {
//               try {
//                   echo "Running Test cases"
//                   sh "cp .env.development .env"
//                   //sh 'make init-test'
//               }
//               catch(Exception e) {
//                   if ( GIT_BRANCH ==~ /.*master|.*hotfix\/.*|.*release\/.*/ )
//                       error "Test case failed"
//                   else
//                       echo "Skipped test if from personal or feature branch"
//               }
//               try {
//                   echo "Running Test code coverage"
//                   //sh 'make init-test-coverage'
//               }
//               catch(Exception e) {
//                   if ( GIT_BRANCH ==~ /.*master|.*hotfix\/.*|.*release\/.*/ )
//                       error "Code coverage failed"
//                   else
//                       echo "Skipped code coverage if from personal or feature branch"
//               }
//            }
//         }
//     }

    stage("Image Prune"){
        imagePrune(CONTAINER_NAME)
    }

//     stage('Image Build'){
//         imageBuild(CONTAINER_NAME, CONTAINER_TAG)
//     }

//     stage('Push to Docker Registry'){
//         withCredentials([usernamePassword(credentialsId: 'dockerHubAccount', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
//             pushToImage(CONTAINER_NAME, CONTAINER_TAG, USERNAME, PASSWORD)
//         }
//     }

    stage('Run App'){
        runApp(CONTAINER_NAME, CONTAINER_TAG, DOCKER_HUB_USER, HTTP_PORT)
    }

}

def imagePrune(containerName){
    try {
//         sh "docker image prune -f"
//         sh "docker stop $containerName"
           sh "docker image prune -f"
           sh "docker-compose -f docker-compose.dev.yml down --volumes"
    } catch(error){}
}

def imageBuild(containerName, tag){
//     sh "docker build -t $containerName:$tag  -t $containerName --pull --no-cache ."
    sh "docker-compose -f docker-compose.dev.yml"
    echo "Image build complete"
}

def pushToImage(containerName, tag, dockerUser, dockerPassword){
    sh "docker login -u $dockerUser -p $dockerPassword"
    sh "docker tag $containerName:$tag $dockerUser/$containerName:$tag"
    sh "docker push $dockerUser/$containerName:$tag"
    echo "Image push complete"
}

def runApp(containerName, tag, dockerHubUser, httpPort){
//     sh "docker pull $dockerHubUser/$containerName"
//     sh "docker run -d --rm -p $httpPort:$httpPort --name $containerName $dockerHubUser/$containerName:$tag"
    sh "docker-compose -f docker-compose.dev.yml up -d --build"
    echo "Application started on port: ${httpPort} (http)"
}