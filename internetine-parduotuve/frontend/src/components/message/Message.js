import { useContext } from 'react';
import MainContext from '../../context/MainContext';

function Message() {
    const { message } = useContext(MainContext);

    return message?.m && <div className={'alert alert-' + message.s}>{message.m}</div>
}

export default Message;