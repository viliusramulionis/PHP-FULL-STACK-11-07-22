function Message({ message }) {
    return message?.m && <div className={'alert alert-' + message.s}>{message.m}</div>
}

export default Message;