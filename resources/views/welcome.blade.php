@extends('layouts.base')

@section('content')

        <div>
            <div class="card">

                <div class="card-body">

                    <div >
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table style="overflow: hidden;" id="kt_datatable" class="table table-head-custom table-vertical-center table-head-bg table-borderless">
                                <thead>
                                    <tr class="text-left">
                                        <th >
                                            <span class="text-dark-75">name</span>
                                        </th>
                                        <th >user role</th>
                                        <th >address</th>
                                        <th >province</th>
                                        <th ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        
                                   
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                
                                                <div>
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $user['details']['name'] }}</a>
                                                    <span class="text-muted font-weight-bold d-block">{{ $user['details']['contact_no'] }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $user['details']['type']=='100001'?'Admin': 'User' }}</span>
                                            <span class="text-muted font-weight-bold">{{ $user['details']['taskQueue'] }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $user['details']['streetAddress'] }}</span>
                                            <span class="text-muted font-weight-bold">{{ $user['details']['barangay'] }}, {{ $user['details']['city'] }}, {{ $user['details']['cityCode'] }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $user['details']['province'] }}</span>
                                        </td>
                                    
                                        <td class="pr-0 text-right">
                                            <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm disabled">Change Status</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
 
@endsection

@section('scripts')
<script type="text/javascript">
    // import {
    //     initializeApp
    // } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
    // import {
    //     getAnalytics
    // } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
    // import {
    //     getDatabase
    // } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-database.js";
    // // TODO: Add SDKs for Firebase products that you want to use
    // // https://firebase.google.com/docs/web/setup#available-libraries

    // // Your web app's Firebase configuration
    // // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    // const firebaseConfig = {
    //     apiKey: "AIzaSyCEjcCPhzeEtj9Tp_MDZM3waHxM97JeahM",
    //     authDomain: "schooapp2022.firebaseapp.com",
    //     databaseURL: "https://schooapp2022-default-rtdb.firebaseio.com",
    //     projectId: "schooapp2022",
    //     storageBucket: "schooapp2022.appspot.com",
    //     messagingSenderId: "26197024544",
    //     appId: "1:26197024544:web:209e7d360fb391cc3ac145",
    //     measurementId: "G-74SZW3KGPH"
    // };

    // // Initialize Firebase
    // var app = initializeApp(firebaseConfig);
    // var firebase = app;
    // var analytics = getAnalytics(app);
    // var database = getDatabase(app);

    // const dbRef = database.ref();
    // dbRef.child("users").get().then((snapshot) => {
    //     if (snapshot.exists()) {
    //         console.log('bal', snapshot.val());
    //     } else {
    //         console.log("No data available");
    //     }
    // }).catch((error) => {
    //     console.error(error);
    // });


    var datatable = $('#kt_datatable').DataTable();

</script>
@endsection