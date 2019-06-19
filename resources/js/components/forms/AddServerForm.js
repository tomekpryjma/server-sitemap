import React from 'react';
import {Formik, Field, Form, FormikProps, ErrorMessage} from 'formik';

export default class extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return(
            <Formik
                initialValues={{
                    name: '',
                    ip_address: ''
                }}
                />
        )
    }
}