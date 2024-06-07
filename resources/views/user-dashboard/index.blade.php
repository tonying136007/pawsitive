@extends('layouts.user-layout')

@section('content')
<div class="main">
    <table>
        <tr>
            <td>
                <section>
                    <h5 class="sub-title">Welcome To Pawsitive Veterinary Clinic</h5>
                    <h1 class="title">Quality Care for Your Beloved Pets</h1>
                    <p>where expertise meets compassion. Our devoted staff provides a comprehensive range of veterinary treatments that are specifically suited to your pet's requirements. We're dedicated to keeping your animal family members healthy and happy by providing cutting-edge facilities and a friendly environment. Trust us to be your pet-care partner.<br><br></p>
                    <a href="#sections" class="btn1">Explore More</a>
                </section>
            </td>
            <td>
                <img src="{{ asset('storage/img/photos/dog-and-cat.png') }}" class="inline-photo show-on-scroll" alt="Pawsitive Veterinary Clinic">
            </td>
        </tr>
    </table>
</div>


<!--CARDS-->
<section class="section0" id="sections">
    <div class="card banner">
        <h1 class="title">Our Services</h1>
        <h5 class="sub-title">Providing Comprehensive Healthcare for Pets</h5>
    </div>
    <div class="card inline-photo show-on-scroll">
        <a href="{{ route('user-info.index-1') }}">
            <i class="fa fa-heartbeat"></i>
            <h3>Medical Services</h3>
        </a>
    </div>
    <div class="card inline-photo show-on-scroll">
        <a href="{{ route('user-info.index-2') }}">
            <i class="fa fa-flask"></i>
            <h3>Laboratory Tests</h3>
        </a>
    </div>
    <div class="card inline-photo show-on-scroll">
        <a href="{{ route('user-info.index-3') }}">
            <i class="fa fa-stethoscope"></i>
            <h3>Diagnostic Imaging</h3>
        </a>
    </div>
    <div class="card inline-photo show-on-scroll">
        <a href="{{ route('user-info.index-4') }}">
            <i class="fa fa-medkit"></i>
            <h3>Surgery</h3>
        </a>
    </div>
    <div class="card inline-photo show-on-scroll">
        <a href="{{ route('user-info.index-5') }}">
            <i class="fa fa-user-md"></i>
            <h3>Emergency Services</h3> 
        </a>
    </div>
    
</section>


<!--CONTAINER-->
<div class="container">
    <table>
        <tr>
            <td>
                <img src="https://i.ibb.co/w4dySWD/01.webp" class="inline-photo show-on-scroll" alt="About Pawsitive Veterinary Clinic">
            </td>
            <td>
                <h6 class="sub-title">About Us</h6>
                <h1 class="title">Your Trusted Veterinary Care Provider</h1>
                <p>At Pawsitive Veterinary Clinic, we are dedicated to providing top-quality veterinary care with a focus on compassion and excellence.</p>
                <p>Our team of experienced veterinarians and staff are committed to keeping your furry friends healthy and happy.</p>
                <a href="#moreaboutus" class="btn2">Learn More</a>
            </td>
        </tr>
    </table>
</div>



<section class="slick" id="moreaboutus">
    <div class="banner">
        <h1 class="title">Why Choose Us</h1>
        <h5 class="sub-title">Bringing the Best Care for Your Pets</h5>
    </div>
    <table>
        <tr>
            <td>
                <ul>
                    <li>
                        <h3>Compassionate Care</h3>
                        <p>We treat your pets like family, providing gentle and compassionate care.</p>
                    </li>
                    <li>
                        <h3>State-of-the-Art Facilities</h3>
                        <p>Our clinic is equipped with modern facilities and advanced medical technology.</p>
                    </li>
                    <li>
                        <h3>Expert Veterinarians</h3>
                        <p>Our team consists of skilled and experienced veterinarians dedicated to your pet's well-being.</p>
                    </li>
                </ul>
            </td>
            <td>
                <div class="card inline-photo show-on-scroll">
                    <div class="image">
                        <img src="https://th.bing.com/th/id/OIP.0UnyxoJIMq6CSFz72SV0FQHaKq?rs=1&pid=ImgDetMain">
                    </div>
                </div>
            </td>
            <td>
                <ul>
                    <li>
                        <h3>Personalized Treatment</h3>
                        <p>We tailor our treatment plans to meet the unique needs of each pet.</p>
                    </li>
                    <li>
                        <h3>Convenient Services</h3>
                        <p>With flexible appointment scheduling and online booking, we make pet care convenient for you.</p>
                    </li>
                    <li>
                        <h3>Community Involvement</h3>
                        <p>We are actively involved in the local community, promoting pet health and welfare.</p>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
</section>




<section class="section1">
    <div class="banner">
        <h1 class="title">Our Specialties</h1>
        <h5 class="sub-title">Expertise in Veterinary Care</h5>
    </div>
    <button class="accordion">Veterinary Medicine</button>
    <div class="panel">
        <p>
        Veterinary medicine focuses on keeping animals healthy. Veterinarians offer check-ups, vaccinations, and operations when required. They also assist to avoid infections that can be transmitted from animals to humans. Using new technology and research, veterinarians are always discovering better ways to care for animals, whether they are pets, agricultural animals, or even wild ones. It is all about ensuring that every animal receives the care it requires to live a happy, healthy life.
        </p>
    </div>

    <button class="accordion">Surgical Procedures</button>
    <div class="panel">
        <p>
        During surgery, anesthetic is used to make the patient comfortable while a team of veterinarians and aids keep them safe. To treat conditions such as tumors or fractures, the surgeon makes precise incisions. Throughout operation, the patient's vital signs are continuously monitored. Afterward, patients are watched while they wake up and given pain medicine. The team collaborates to provide the finest treatment for the patient from beginning to end.
        </p>
    </div>

    <button class="accordion">Pet Nutrition</button>
    <div class="panel">
        <p>
        Good nutrition is key to keeping pets healthy and happy. They need a balanced diet with proteins, carbs, fats, vitamins, and minerals. Choose quality pet food and avoid feeding them human food. Proper nutrition helps pets grow, stay strong, and avoid health problems.
        </p>
    </div>

</section>



<!--FOOTER-->

@endsection
