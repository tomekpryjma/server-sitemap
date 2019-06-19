import React from 'react';
import {Formik, Field, Form, FormikProps, ErrorMessage} from 'formik';

export default class extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return(    
        // <Formik
        //     initialValues={user /** { email, social } */}
        //     onSubmit={(values, actions) => {
        //     MyImaginaryRestApiCall(user.id, values).then(
        //         updatedUser => {
        //         actions.setSubmitting(false);
        //         updateUser(updatedUser);
        //         onClose();
        //         },
        //         error => {
        //         actions.setSubmitting(false);
        //         actions.setErrors(transformMyRestApiErrorsToAnObject(error));
        //         actions.setStatus({ msg: 'Set some arbitrary status or data' });
        //         }
        //     );
        //     }}
        //     render={({ errors, status, touched, isSubmitting }) => (
        //     <Form>
        //         <Field type="email" name="email" />
        //         <ErrorMessage name="email" component="div" />  
        //         <Field type="text" className="error" name="social.facebook" />
        //         <ErrorMessage name="social.facebook">
        //         {errorMessage => <div className="error">{errorMessage}</div>}
        //         </ErrorMessage>
        //         <Field type="text" name="social.twitter" />
        //         <ErrorMessage name="social.twitter" className="error" component="div"/>  
        //         {status && status.msg && <div>{status.msg}</div>}
        //         <button type="submit" disabled={isSubmitting}>
        //         Submit
        //         </button>
        //     </Form>
        //     )}
        // />


            <Formik
                initialValues={{
                    name: '',
                    ip_address: ''
                }}

                onSubmit={(name, ip_address) => {
                    console.log("Name: " + name);
                    console.log("IP Addr: " + ip_address);
                }}

                render={({errors, status, touched, isSubmitting}) => (
                    <Form>
                        <Field type="email" name="email" />
                        <ErrorMessage name="email" component="div" />
                        <Field type="text" name="social.twitter" />
                        <ErrorMessage name="social.twitter" className="error" component="div"/>  
                        {status && status.msg && <div>{status.msg}</div>}
                        <button type="submit" disabled={isSubmitting}>
                        Submit
                        </button>
                    </Form>
                )}
            />
        )
    }
}