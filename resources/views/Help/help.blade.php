@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layoutAuth.sidebar')
@include('layoutAuth.navbar')


<div style="padding: 40px">
    <div class="flex items-center">
        <img src="{{asset('assets/image/esh-logo.png')}}" class="hidden md:inline" style="height: 240px">
        <h1 class="font-bold text-4xl logo-color text-center">The electrical schoolHouse</h1>
    </div>
    <p style="font-family: sans-serif;text-indent:3rem;font-size:700;padding:20px">
        Welcome to the Electric Schoolhouse! We've designed this website to be
        user-friendly, but we understand that you may have questions or need assistance.
        That's why we've put together this Help page to provide you with answers to some
        common questions.
    </p>
    <span>
        <span class="font-bold" style="font-family:sans-serif;text-indent:3rem;padding:20px;
          text-decoration: underline;">
            How do I submit an article or a quiz?</span><br>
        <span style="font-family:sans-serif;text-indent:10rem;padding:20px">
            To read other users' articles and quizzes, simply click on the "Articles"
            or "Quizzes" tab on the homepage. You can browse through the list of articles
            and quizzes and click on the ones that interest you to read them.
        </span>
    </span>
    <span><br>
        <span class="font-bold" style="font-family:sans-serif;text-indent:6rem;padding:20px;
           text-decoration: underline;">
            How do I add or delete a comment?
        </span><br>
        <span style="font-family:sans-serif;text-indent:6rem;padding:20px">
            To add a comment, scroll down to the bottom of the article or quiz page
            and enter your comment in the comment box. Click on "Submit" to post your
            comment. To delete a comment, click on the "Delete" button next to your comment.
        </span>
    </span>
    <div class="livreRecomended">
        <h5 class="text-star indent-3 text-xl font-extrabold logo-color"
            style="font-family:sans-serif;text-indent:6rem;padding:20px">Les livres recommandé</h5>
        <div class="card-container grid grid-cols-6 gap overflow-scroll overflow-x-auto" style="height:70vh">
            <div class="card col-span-2 rounded-lg shadow-lg mt-4"
                style="background-image: url('assets/image/BookElectric/analogique.jpg');">
                <h1 class="font-bold text-center text-lg ">Introduction a
                    l'electronique Analogique</h1>
            </div>
            <div class="card col-span-2 rounded-lg shadow-lg mt-4"
                style="background-image: url('assets/image/BookElectric/electrotechni.jpg');">
                <h1 class="font-bold text-center text-lg ">Electrotechnique</h1>
            </div>
            <div class="card col-span-2 rounded-lg shadow-lg mt-4"
                style="background-image: url('assets/image/BookElectric/micro.jpg');">
                <h1 class="font-bold text-center text-lg ">Systemes a microprocesseurs</h1>
            </div>
            <div class="card col-span-2 rounded-lg shadow-lg mt-4"
                style="background-image: url('assets/image/BookElectric/tts1.jpg');">
                <h1 class="font-bold text-center text-lg ">Traitement de signal</h1>
            </div>
            <div class="card col-span-2 rounded-lg shadow-lg mt-4"
                style="background-image: url('assets/image/BookElectric/elec-puis.jpg');">
                <h1 class="font-bold text-center text-lg ">Electronique de puissance</h1>
            </div>
        </div>

    </div>

    <div>
        <h5 class="text-star indent-3 text-xl font-extrabold logo-color"
            style="font-family:sans-serif;text-indent:6rem;padding:20px">les sites recommandé</h5>
        <ul class="siteWEB">
            <li><a href="https://www.allaboutcircuits.com/">All About Circuits</a> -
                All About Circuits is an online community that provides
                free tutorials, articles, and a forum for discussion
                on electrical engineering, electronics, and related fields.</li>
            <li><a href="https://electrical-engineering-portal.com/">Electrical Engineering Portal</a>
                Electrical Engineering Portal is a website that provides a wide range of
                resources and documentation on electrical engineering, including articles,
                tutorials, and news related to the field.</li>
            <li><a href="https://www.eeweb.com/"> EEWeb</a>
                EEWeb is a website that provides a range of resources and
                documentation on electrical engineering, including tutorials,
                articles, and a forum for discussion.</li>
            <li><a href="https://www.electronicshub.org/">Electronics Hub</a>
                Electronics Hub is a website that provides a variety
                of resources and documentation on electrical engineering,
                including tutorials, projects, and news related to the field.</li>
        </ul>
    </div>
    <div class="m-6 p-5">
        <h5 class="text-star indent-3 text-xl font-extrabold logo-color"
            style="font-family:sans-serif;text-indent:6rem;padding:20px">About us</h5>
        <p style="font-family:sans-serif;text-indent:2rem">
            Electrical schoolHouse is an online platform for students, teachers,
            technicians, and engineers in the field of electrical engineering.
            The platform allows users to create, modify, and delete blog articles related
            to the electrical engineering field, as well as to read and comment on articles
            created by other users. Additionally, users can take quizzes to test their knowledge
            of electrical engineering, and they can earn points for various activities on the platform,
            such as publishing articles and taking quizzes. These points can be converted into
            a currency if the user accumulates over 10,000 points. The platform also includes
            different user roles, including super admin, admin, and user, with different levels
            of permissions and access.
        </p>
    </div>

</div>



@include('layoutAuth.footer')
@push('styles')
<style>
.card {
    height: 400px;
    background-size: cover;
    background-position: center;
    width: 300px;
    background-size: 100% 100%;
    position: relative
}

.card h1 {
    position: absolute;
    bottom: 20%;
    left: 50%;
    transform: translateX(-50%);
    color: #fff;
    opacity: 0;
    transition: all 0.5s ease;
}

.card:hover {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.5);
    background-size: 100% 100%;
    z-index: 5;

}

.card:hover h1 {
    opacity: 1;
    z-index: 5;
}

.siteWEB {
    list-style: disc;
    padding: 30px;
    margin-left: 10px;
}

.siteWEB li {
    margin: 10px 0;
}

.siteWEB li a {
    text-decoration: none;
    color: #1843479c;
    font-weight: bold
}

.siteWEB li a:hover {
    text-decoration: underline;
}

</style>
@endpush
@endsection