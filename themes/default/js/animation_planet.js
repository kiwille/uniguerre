var VIEW_WIDTH = 900; //largeur de la vue
var VIEW_HEIGHT = 600; //hauteur de la vue
var VIEW_ANGLE = 45; //angle de vue
var ASPECT = VIEW_WIDTH / VIEW_HEIGHT; //ratio d'affichage
var NEAR = 0.1; //distance minimale par rapport à la scène
var FAR = 2000; //distance maximale par rapport à la scène
var onRenderFcts = [];

var path_design = $("#path_design").val();
var img_starfield = $("#img_starfield").val();
var img_sun = $("#img_sun").val();
var img_sun_cloud_trans = $("#img_sun_cloud_trans").val();
var img_sun_cloud = $("#img_sun_cloud").val();
var img_planet = $("#img_planet").val();
var img_planet_ring = $("#img_planet_ring").val();
var img_planet_cloud_trans = $("#img_planet_cloud_trans").val();
var img_planet_cloud = $("#img_planet_cloud").val();
var img_moon = $("#img_moon").val();

var idAnimation;
 
var animation_planet = {
    baseUrl : function() {
        return path_design+'img/texture/';
    },
    getRenderer : function() {
        var renderer = new THREE.WebGLRenderer({antialias: true});
        renderer.setSize(VIEW_WIDTH, VIEW_HEIGHT);
        $("#planete").append(renderer.domElement);
        renderer.shadowMapEnabled = true;
        
        return renderer;
    },
    getCamera : function(scene) {
        var camera = new THREE.PerspectiveCamera(VIEW_ANGLE, ASPECT, NEAR, FAR);
        camera.position.set(0, 0, 3); //positionnement initial X Y Z
        camera.lookAt(scene.position); //orientation vers le centre de la scène
        
        return camera;
    },
    getLightFond : function(colorLightFond) {
        return new THREE.AmbientLight(colorLightFond);
    },
    getLight : function(colorLight) {
        var light = new THREE.DirectionalLight(colorLight, 4);
        light.position.set(0, 0, -20);
        light.castShadow = true;
        light.shadowCameraNear = 0.01;
        light.shadowCameraFar = 23;
        light.shadowCameraFov = 45;
        light.shadowCameraLeft = -1;
        light.shadowCameraRight = 1;
        light.shadowCameraTop = 1;
        light.shadowCameraBottom = -1;
        //light.shadowCameraVisible	= true;
        light.shadowBias = 0.001;
        light.shadowDarkness = 0;
        light.shadowMapWidth = 1024;
        light.shadowMapHeight = 1024;
        
        return light;
    },
    getSpotLight : function(colorSpotLight) {
        var spotLight = new THREE.SpotLight(colorSpotLight, 2);
        spotLight.position.set(0, 0, 0.01);
        spotLight.castShadow = true;
        spotLight.shadowMapWidth = 1024;
        spotLight.shadowMapHeight = 1024;
        spotLight.shadowCameraNear = 500;
        spotLight.shadowCameraFar = 4000;
        spotLight.shadowCameraFov = 30;
        
        return spotLight;
    },
    getStarfield : function() {
        return THREEx.Planets.createStarfield(img_starfield);
    },
    getSun : function () {
        var sun = THREEx.Planets.createSun(img_sun);
        sun.position.set(0, 0, -20);
        sun.scale.multiplyScalar(15);
        sun.receiveShadow = true;
        sun.castShadow = true;
        onRenderFcts.push(function(delta, now) {
            sun.rotation.y += 1 / 64 * delta;
        });
        
        var geometry_Sun = new THREE.SphereGeometry(0.5, 32, 32);
        var material_Sun = THREEx.createAtmosphereMaterial();
        material_Sun.side = THREE.BackSide;
        material_Sun.uniforms.glowColor.value.set(0xFF9900);
        material_Sun.uniforms.coeficient.value = 0.5;
        material_Sun.uniforms.power.value = 4.0;
        var mesh_Sun = new THREE.Mesh(geometry_Sun, material_Sun);
        mesh_Sun.scale.multiplyScalar(1.15);
        sun.add(mesh_Sun);

        var sunCloud = THREEx.Planets.createSunDynamics(img_sun_cloud_trans, img_sun_cloud);
        sunCloud.receiveShadow = true;
        sunCloud.castShadow = true;
        sun.add(sunCloud);
        onRenderFcts.push(function(delta, now) {
            sunCloud.rotation.y += 1 / 15 * delta;
        });
        
        return sun;
    },
    getPlanet : function () {
        var planet = new THREE.Object3D();
        planet.rotateZ(-23.4 * Math.PI / 180);
        planet.position.z = 0.5;

        var earthMesh = THREEx.Planets.createPlanet(img_planet);
        earthMesh.receiveShadow = true;
        earthMesh.castShadow = true;
        planet.add(earthMesh);
        onRenderFcts.push(function(delta, now) {
            earthMesh.rotation.y += 1 / 16 * delta;
        });

        var ring = THREEx.Planets.createRing(img_planet_ring);
        ring.receiveShadow = true;
        ring.castShadow = true;
        earthMesh.add(ring);

        var geometry = new THREE.SphereGeometry(0.5, 32, 32);
        var material = THREEx.createAtmosphereMaterial();
        material.side = THREE.BackSide;
        material.uniforms.glowColor.value.set(0x00b3ff);
        material.uniforms.coeficient.value = 0.5;
        material.uniforms.power.value = 4.0;
        var mesh = new THREE.Mesh(geometry, material);
        mesh.scale.multiplyScalar(1.15);
        planet.add(mesh);

        var earthCloud = THREEx.Planets.createCloud(img_planet_cloud_trans, img_planet_cloud);
        earthCloud.receiveShadow = true;
        earthCloud.castShadow = true;
        planet.add(earthCloud);
        onRenderFcts.push(function(delta, now) {
            earthCloud.rotation.y += 1 / 8 * delta;
        });
        
        return planet;
    },
    getMoon : function () {
        var moon = THREEx.Planets.createMoon(img_moon);
        moon.position.set(0.5, 0.5, 0.5);
        moon.scale.multiplyScalar(1 / 5);
        moon.receiveShadow = true;
        moon.castShadow = true;
        onRenderFcts.push(function(delta, now) {
            moon.rotation.y += 1 / 16 * delta;
        });
        
        return moon;
    }
}; 
 
 $("#planete").ready(function () {
    THREEx.Planets.baseURL = animation_planet.baseUrl();

    var renderer = animation_planet.getRenderer();
    var scene = new THREE.Scene();
    var camera = animation_planet.getCamera(scene);

    //----- Jeu de lumières
    var lightFond = animation_planet.getLightFond(0x666666);
    var light = animation_planet.getLight(0xffffff);
    var spotLight = animation_planet.getSpotLight(0xffffff);
    scene.add(lightFond);
    scene.add(light);
    scene.add(spotLight);

    //----- Fond galaxie
    var starSphere = animation_planet.getStarfield();
    scene.add(starSphere);

    //----- Soleil
    var sun = animation_planet.getSun();
    scene.add(sun);

    //----- Planete
    var planet = animation_planet.getPlanet();
    scene.add(planet);

    //----- Lune
    var moon = animation_planet.getMoon();
    planet.add(moon);

    //////////////////////////////////////////////////////////////////////////////////
    //		Camera Controls							//
    //////////////////////////////////////////////////////////////////////////////////
    var mouse = {x: 0, y: 0};
    document.addEventListener('mousemove', function(event) {
        mouse.x = (event.clientX / window.innerWidth) - 0.5;
        mouse.y = (event.clientY / window.innerHeight) - 0.5;
    }, false);
    
    document.getElementById("planete").addEventListener("mousewheel", mouseWheelHandler);
    document.getElementById("planete").addEventListener("DOMMouseScroll", mouseWheelHandler);
    function mouseWheelHandler(e) {
        var e = window.event || e;
        e.preventDefault();
        var delta = Math.max(-0.5, Math.min(0.5, (e.wheelDelta || -e.detail)));
        camera.position.z -= delta;
        if (camera.position.z <= 3) camera.position.z = 3;
        if (camera.position.z >= 7) camera.position.z = 7;
        console.log("camera position z: " + camera.position.z + " delta:"+delta);
        return false;
    }
    
    onRenderFcts.push(function(delta, now) {
        camera.position.x += (mouse.x * 5 - camera.position.x) * (delta * 3);
        camera.position.y += (mouse.y * 5 - camera.position.y) * (delta * 3);
        camera.lookAt(scene.position);
    });

    //////////////////////////////////////////////////////////////////////////////////
    //		render the scene						//
    //////////////////////////////////////////////////////////////////////////////////
    onRenderFcts.push(function() {
        renderer.render(scene, camera);
    });

    //////////////////////////////////////////////////////////////////////////////////
    //		loop runner							//
    //////////////////////////////////////////////////////////////////////////////////
    var lastTimeMsec = null;
    idAnimation = requestAnimationFrame(function animate(nowMsec) {
        if (idAnimation) {
            // keep looping
            requestAnimationFrame(animate);
            // measure time
            lastTimeMsec = lastTimeMsec || nowMsec - 1000 / 60;
            var deltaMsec = Math.min(200, nowMsec - lastTimeMsec);
            lastTimeMsec = nowMsec;
            // call each update function
            onRenderFcts.forEach(function(onRenderFct) {
                onRenderFct(deltaMsec / 1000, nowMsec / 1000);
            });
        }
    });
    
    //Stopper l'animation
    $("a.dropdown").click(function() {
        window.cancelAnimationFrame(idAnimation);
        idAnimation = null;
    });
});